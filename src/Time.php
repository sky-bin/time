<?php

namespace Phpwb\Time;


class Time
{
    public function __construct()
    {
        //设置时区
        date_default_timezone_set("PRC");
    }

    //获取指定时间
    public static function getTime($type = '')
    {
        date_default_timezone_set("PRC");
        switch ($type){
            case 'today':
                $data = date('Y-m-d H:i:s', time());
                break;
            case 'yesterday':
                $data = date("Y-m-d",strtotime("-1 day"));
                break;
            case 'tomorrow':
                $data = date("Y-m-d",strtotime("+1 day"));
                break;
            default:
                $data = date('Y-m-d H:i:s', time());
        }
        return $data;
    }

    //获取更多时间
    public static function getMoreTime($type = '')
    {
        date_default_timezone_set("PRC");
        switch ($type){
            case 'week':
                $data_0 = date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y")));
                $data_1 = date("Y-m-d",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y")));
                break;
            case 'month':
                $data_0 = date("Y-m-d",mktime(0, 0 , 0,date("m"),1,date("Y")));
                $data_1 = date("Y-m-d",mktime(23,59,59,date("m"),date("t"),date("Y")));
                break;
            case 'year':
                $data_0 = date("Y-01-01", time());
                $data_1 = date("Y-12-31", time());
                break;
            default:
                $data_0 = date('Y-m-d', time());
                $data_1 = date('Y-m-d', time());
        }
        $data[0] = $data_0;
        $data[1] = $data_1;
        return $data;
    }

    //获取两个时期时间的日期
    public static function getDays($start_time = '', $end_time = '')
    {
        $start_time = strtotime($start_time);
        $end_time = strtotime($end_time);
        $i = 0;
        $arr = [];
        while ($start_time<=$end_time){
            $arr[$i]=date('Y-m-d',$start_time);
            $start_time = strtotime('+1 day',$start_time);
            $i++;
        }
        return $arr;
    }
}




?>