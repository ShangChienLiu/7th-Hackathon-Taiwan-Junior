<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    // index
    public function index(){
        return view('rent.register');
    }

    // register
    public function store(Request $request){
        // validation rule
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'born' => 'required',
            'email' => 'required|email',
            'rent_period' => 'required|numeric',
            'data' => 'required',
            'phone' => 'required|max:255',
        ]);

        // valid if age < 18
        $v->sometimes(['parent_name', 'parent_phone', 'parent_relation'], 'required|max:255', function($input) {
            $now = strtotime('now');
            $date = strtotime($input->born);
            return (($now-$date) / (365*24*60*60)) < 18;
        });

        // valid fails
        if($v->fails() || !$request->hasFile('data') || pathinfo($request->file('data')->getClientOriginalName(), PATHINFO_EXTENSION) != 'pdf' || $this->schedule_guard($request->input('born'))) {
            $request->flashExcept(['parent_name', 'parent_phone', 'parent_relation', 'data']);
            return redirect()->route('rent.index')->with('message', 'error');
        }
        else{   // valid success
            // handle file
            $time = date('H-i-s');
            $today = date('Y-m');
            $path = public_path('storage').'/'.$today;
            $filename = sprintf("%s-%s.pdf", $time, $request->input('name'));


            // build directory if it doesn't exist
            if (!file_exists($path))
                mkdir($path);
            $request->file('data')->move($path, $filename);
            $path = substr($path, 15);
            $complete_path = $path.'/'.$filename;

            DB::table('rent_register')->insert(array(
                'name' => $request->input('name'),
                'born' => $request->input('born'),
                'email' => $request->input('email'),
                'rent_period' => $request->input('rent_period'),
                'data' => $complete_path,
                'phone' => $request->input('phone'),
                'parent_name' => $request->input('parent_name'),
                'parent_phone' => $request->input('parent_phone'),
                'parent_relation' => $request->input('parent_relation'),
                'created_at' => date('Y-m-d H:i:s')
            ));

            return redirect()->route('rent.index')->with('message', 'success');
        }
    }
}
