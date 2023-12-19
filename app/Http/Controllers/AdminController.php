<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $waited_it = DB::table('rent_register')->where('progress', '0')->count();
        $get_it = DB::table('rent_register')->where('progress', '1')->count();
        // dd($host);
        return view('admin', array('percent' => floor(($get_it / ($waited_it + $get_it)) * 100)+ 0.5));
    }

    public function IT_eqpt_waited_check()
    {
        $results = DB::table('rent_register')->where('progress', 'like', '0')->get();
        $count = DB::table('rent_register')->where('progress', 'like', '0')->count();
        // dd($results);
        return view('admin.IT_eqpt.waited_check', compact('results', 'count'));
    }

    public function IT_eqpt_finished_check()
    {
        $results = DB::table('rent_register')->where('progress', '-1')->orWhere('progress', '1')->orderBy('created_at', 'desc')->paginate(10);
        $count = DB::table('rent_register')->where('progress', '-1')->orWhere('progress', '1')->count();
        return view('admin.IT_eqpt.finished_check', compact('results', 'count'));
    }

    public function IT_eqpt_upload_progress(Request $request)
    {
        DB::table('rent_register')->where('id', 'like', $request['id'])->update(array('progress' => $request['value']));
        return redirect()->route('dashboard');
    }

    public function FindVolunteer_waited_check()
    {
        $priority = DB::table('find_volunteer')
            ->where('progress', 0)
            ->where('proof', '!=', NULL)
            ->orderBy('id', 'asc')
            ->get();

        foreach ($priority->all() as $data) {
            $data->{'identity'} = 2;
            $data->{'period'} = $this->period_parse($data->period);
        }

        $normal = DB::table('find_volunteer')
            ->where('progress', 0)
            ->where('proof', NULL)
            ->orderBy('id', 'asc')
            ->get();

        foreach ($normal->all() as $data) {
            $data->{'identity'} = 1;
            $data->{'period'} = $this->period_parse($data->period);
        }

        $count = DB::table('find_volunteer')
            ->where('progress', 0)
            ->count();

        $results = array_merge($priority->all(), $normal->all());

        return view('admin.FindVolunteer.waited_check', compact('results', 'count'));
    }

    public function FindVolunteer_finished_check()
    {
        $results = DB::table('find_volunteer')->where('progress', '2')->orWhere('progress', '1')->orWhere('progress','-1')->orderBy('id', 'asc')->paginate(10);
        $count = DB::table('find_volunteer')->where('progress', '2')->orWhere('progress', '1')->orWhere('progress','-1')->count();

        foreach ($results as $data) {
            $data->{'period'} = $this->period_parse($data->period);
        }
        return view('admin.FindVolunteer.finished_check', compact('results', 'count'));
    }

    public function FindVolunteer_upload_progress(Request $request)
    {
        DB::table('find_volunteer')->where('id', $request['id'])->update(array('progress' => $request['value']));
        return redirect()->route('dashboard');
    }

    public function BeVolunteer_waited_check()
    {
        $results = DB::table('be_volunteer')
            ->where('progress', 0)
            ->orderBy('id', 'asc')
            ->get();

        foreach ($results->all() as $data) {
            $data->{'period'} = $this->period_parse($data->period);
        }

        $count = DB::table('be_volunteer')
            ->where('progress', 0)
            ->count();

        return view('admin.BeVolunteer.waited_check', compact('results', 'count'));
    }

    public function BeVolunteer_waited_level()
    {
        $results = DB::table('be_volunteer')->where('progress', '1')->orderBy('id', 'asc')->get();
        $count = DB::table('be_volunteer')->where('progress', '1')->count();

        foreach ($results as $data) {
            $data->{'period'} = $this->period_parse($data->period);
        }
        return view('admin.BeVolunteer.waited_level', compact('results', 'count'));
    }

    public function BeVolunteer_upload_level(Request $request)
    {
        DB::table('be_volunteer')->where('id', $request['id'])->update(array('progress' => $request['value']));
        return redirect()->route('dashboard');
    }

    public function BeVolunteer_levelup()
    {
        $results = DB::table('be_volunteer')->where('progress', '2')->orderBy('id', 'asc')->get();
        $count = DB::table('be_volunteer')->where('progress', '2')->count();

        foreach ($results as $data) {
            $data->{'period'} = $this->period_parse($data->period);
        }
        return view('admin.BeVolunteer.levelup', compact('results', 'count'));
    }

    public function BeVolunteer_resign(Request $request)
    {
        DB::table('be_volunteer')->where('id', $request['id'])->delete();
        return redirect()->route('dashboard');
    }

    public function system()
    {
        return view('admin.system.system');
    }

    public function be_volunteer_status()
    {
        $be_volunteer_0 = DB::table('be_volunteer')->where('progress', '0')->count();
        $be_volunteer_1 = DB::table('be_volunteer')->where('progress', '1')->count();
        $be_volunteer_2 = DB::table('be_volunteer')->where('progress', '2')->count();
        return array('be_volunteer_0' => $be_volunteer_0, 'be_volunteer_1' => $be_volunteer_1, 'be_volunteer_2' => $be_volunteer_2);
    }

    public function find_volunteer_status()
    {
        $find_volunteer_0 = DB::table('find_volunteer')->where('progress', '0')->count();
        $find_volunteer_1 = DB::table('find_volunteer')->where('progress', '1')->count();
        return array('find_volunteer_0' => $find_volunteer_0, 'find_volunteer_1' => $find_volunteer_1);
    }



    public function system_config(Request $request)
    {
        $normal_start_hour = strtotime($request['normal_start']);
        $normal_start_hour = date('H', $normal_start_hour);

        $normal_end_hour = strtotime($request['normal_end']);
        $normal_end_hour = date('H', $normal_end_hour);

        $disable_start_hour = strtotime($request['disable_start']);
        $disable_start_hour = date('H', $disable_start_hour);

        $disable_end_hour = strtotime($request['disable_end']);
        $disable_end_hour = date('H', $disable_end_hour);
        /*
            SET Config
        */

        $a =  config(['MAIL_MAILER']);
        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                'NORMAL_START_TIME='.$_ENV['NORMAL_START_TIME'], 'NORMAL_START_TIME='.$request['normal_start'], file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'NORMAL_END_TIME='.$_ENV['NORMAL_END_TIME'], 'NORMAL_END_TIME='.$request['normal_end'], file_get_contents($path)
            ));

            file_put_contents($path, str_replace(
                'DISABLE_START_TIME='.$_ENV['DISABLE_START_TIME'], 'DISABLE_START_TIME='.$request['disable_start'], file_get_contents($path)
            ));

            file_put_contents($path, str_replace(
                'DISABLE_END_TIME='.$_ENV['DISABLE_END_TIME'], 'DISABLE_END_TIME='.$request['disable_end'], file_get_contents($path)
            ));
        }

        chdir("/hack/hackthon/resources/system_script");
        $command = "./crontab_task.sh ".$normal_start_hour." ".$normal_end_hour." ".$disable_start_hour." ".$disable_end_hour;
        exec($command, $execute_result, $status);

        if(!$status)
            return redirect('/dashboard/system')->with('success', '200');
        else
            return redirect('/dashboard/system')->with('error', -1);
    }

    public function result() {
        $match_result = DB::table('send_mail_list')
            ->get();

        $combine = [];
        $find = [];
        $be = [];

        foreach ($match_result as $data) {

            array_push($be, DB::table('be_volunteer')
                ->where('id', $data->be_volunteer)
                ->select('name', 'email', 'phone', 'field', 'city')
                ->first());

            array_push($find, DB::table('find_volunteer')
                ->where('id', $data->find_volunteer_id)
                ->select('name', 'email', 'phone', 'field', 'city')
                ->first());
        }
        return view('admin.system.result', compact('find', 'be'));
    }
}
