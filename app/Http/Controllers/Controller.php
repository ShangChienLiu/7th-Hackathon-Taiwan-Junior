<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function time_guard($start, $end) {
        if(strtotime($end) - strtotime($start) < 0)
            return false;
        else
            return true;
    }

    public function schedule_guard($str) {
        if(strtotime($str) > strtotime(date('Y-m-d')))  // input time is larger than now
            return true;
        else
            return false;
    }

    public function period_parse($str) {
        $newstr = '';
        $str = explode(' ', $str);

        foreach($str as $data) {
            switch($data) {
                case '0':
                    $newstr .= '上午、';
                    break;
                case '1':
                    $newstr .= '下午、';
                    break;
                case '2':
                    $newstr .= '晚上、';
                    break;
            }
        }
        $newstr = substr($newstr, 0, strlen('、') * -1);

        return $newstr;
    }
}
