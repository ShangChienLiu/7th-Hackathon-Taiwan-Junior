<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function welcome()
    {
        $data = DB::table('send_mail_list')->get();

        foreach ($data as $row) {
            $teach = DB::table('be_volunteer')->where('id', $row->be_volunteer)->first();
            $stu = DB::table('find_volunteer')->where('id', $row->find_volunteer_id)->first();

            Mail::send('mail.welcome_teacher', array('start_date' => $row -> start_date, 'end_date' => $row -> end_date, 'period' => $this->period_parse($stu->period), 'field' => $teach->field, 'city' => $teach->city), function ($message) use ($teach) {
                $message->to($teach->email)->subject('弱勢數位學習關懷平台 - 志工媒合成功通知');
            });
            Mail::send('mail.welcome_teacher', array('start_date' => $row -> start_date, 'end_date' => $row -> end_date, 'period' => $this->period_parse($stu->period), 'field' => $teach->field, 'city' => $teach->city), function ($message) use ($stu) {
                $message->to($stu->email)->subject('弱勢數位學習關懷平台 - 志工媒合成功通知');
            });

            DB::table('be_volunteer')->where('id', $row->be_volunteer)->update(['progress' => 4]);
            DB::table('find_volunteer')->where('id', $row->find_volunteer_id)->update(['progress' => 4]);
            // DB::table('send_mail_list')->where('id', $row->id)->delete();
        }
    }
}
