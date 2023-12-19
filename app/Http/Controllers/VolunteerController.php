<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('volunteer.index');
    }

    public function Find(Request $request)
    {
        // validation rule
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'born' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'period' => 'required',
            'field' => 'required',
            'city' => 'required',
        ]);

        $hasfile = false;
        if($request->hasFile('proof'))
            $hasfile = true;

        // valid fails
        if ($v->fails() || ($hasfile && pathinfo($request->file('proof')->getClientOriginalName(), PATHINFO_EXTENSION) != 'pdf') || !$this->schedule_guard($request->input('start_date')) || $this->schedule_guard($request->input('born')) || !$this->schedule_guard($request->input('end_date')) || !$this->time_guard($request->input('start_date'), $request->input('end_date'))) {
            $request->flashExcept('proof');
            return redirect()->route('volunteer')->with('find_message', 'error');
        } else {   // valid success

            // handle file
            if($hasfile) {
                $time = date('H-i-s');
                $today = date('Y-m');
                $path = public_path('storage') . '/' . $today . '/proof';
                $filename = sprintf("%s-%s.pdf", $time, $request->input('name'));

                // build directory if it doesn't exist
                if (!file_exists($path))
                    mkdir($path);
                $request->file('proof')->move($path, $filename);
                $path = substr($path, 15);
                $complete_path = $path . '/' . $filename;
            }
            else
                $complete_path = NULL;

            $period_format = '';
            foreach($request->input('period') as $data) {
                $period_format .= $data;
                $period_format .= ' ';
            }

            DB::table('find_volunteer')->insert(array(
                'name' => $request->input('name'),
                'born' => $request->input('born'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'period' => $period_format,
                'field' => $request->input('field'),
                'proof' => $complete_path,
                'city' => $request->input('city'),
                'created_at' => date('Y-m-d H:i:s')
            ));

            return redirect()->route('volunteer')->with('find_message', 'success');
        }
    }

    public function Be(Request $request)
    {
        // validation rule
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'born' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'period' => 'required',
            'field' => 'required|max:255',
            'intro' => 'required',
            'city' => 'required',
        ]);

        // valid fails
        if ($v->fails() || !$request->hasFile('intro') || pathinfo($request->file('intro')->getClientOriginalName(), PATHINFO_EXTENSION) != 'pdf' || $this->schedule_guard($request->input('born')) || !$this->schedule_guard($request->input('start_date')) || !$this->schedule_guard($request->input('end_date')) || !$this->time_guard($request->input('start_date'), $request->input('end_date'))) {
            $request->flash('intro');
            return redirect()->route('volunteer')->with('be_message', 'error');
        } else {   // valid success
            // handle file
            $time = date('H-i-s');
            $today = date('Y-m');
            $path = public_path('storage') . '/' . $today . '/intro';
            $filename = sprintf("%s-%s.pdf", $time, $request->input('name'));

            // build directory if it doesn't exist
            if (!file_exists($path))
                mkdir($path);
            $request->file('intro')->move($path, $filename);
            $path = substr($path, 15);
            $complete_path = $path . '/' . $filename;

            $period_format = '';
            foreach($request->input('period') as $data) {
                $period_format .= $data;
                $period_format .= ' ';
            }

            DB::table('be_volunteer')->insert(array(
                'name' => $request->input('name'),
                'born' => $request->input('born'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'period' => $period_format,
                'field' => $request->input('field'),
                'intro' => $complete_path,
                'city' => $request->input('city'),
                'created_at' => date('Y-m-d H:i:s')
            ));

            return redirect()->route('volunteer')->with('be_message', 'success');
        }
    }
}
