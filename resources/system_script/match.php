<?php
    /*
        include config file
                sql file
    */
    $configs = include_once('config.php');
    include_once('db_init.php');

    /*
        透過 be_volunteer 尋訪
        每個 be_volunteer 去比較 find_volunteer

    */




    /*
        科目
    */

    $be_volunteer = $sql -> prepare('SELECT * FROM `be_volunteer` WHERE progress = 2');
    $be_volunteer -> execute();

    $find_volunteer = $sql -> prepare('SELECT * FROM `find_volunteer` WHERE 1');



    while($row = $be_volunteer->fetch(PDO::FETCH_ASSOC)){
        $target_field = $row['field'];
        $teach_city = $row['city'];
        $target_period_arr = explode(" ", trim($row['period']));
        $target_start_date = $row['start_date'];
        $target_end_date = $row['end_date'];

        /*
            array_match_field 儲存符合科目者
            array_match_area 儲存符合地區者
        */

        $array_match_field = array();
        $array_match_city = array();
        $array_match_period = array();

        $find_volunteer -> execute();
        while($row2 = $find_volunteer->fetch(PDO::FETCH_ASSOC)){
            if($row2['field'] == $target_field){
                array_push($array_match_field, $row2['id']);
            }
        }

        $find_volunteer_by_id = $sql -> prepare('SELECT * FROM `find_volunteer` WHERE id = :id');

        foreach($array_match_field as $item){
            $find_volunteer_by_id -> execute(array('id' => $item));

            while($row2 = $find_volunteer_by_id->fetch(PDO::FETCH_ASSOC)){
                if($row2['city'] == $teach_city){
                    array_push($array_match_city, $row2['id']);
                }
            }
        }
        foreach($array_match_city as $item){
            $find_volunteer_by_id -> execute(array('id' => $item));

            while($row2 = $find_volunteer_by_id->fetch(PDO::FETCH_ASSOC)){

                $row2_explode = explode(" ", trim($row2['period']));
                foreach($row2_explode as $period_item){
                    foreach($target_period_arr as $target_period_item){
                        if($period_item == $target_period_item){
                            array_push($array_match_period, $row2['id']);
                        }
                    }
                }
            }
        }

        $best_duration = 0;
        $best_id = -1;
        $last_update_at;
        $start_time;
        $end_time;
        foreach($array_match_period as $item){
            $find_volunteer_by_id -> execute(array('id' => $item));

            while($row2 = $find_volunteer_by_id->fetch(PDO::FETCH_ASSOC)){
                // 修正計算方法
                $cal = min(strtotime($row2['end_date']), strtotime($target_end_date)) - min(strtotime($row2['start_date']), strtotime($target_start_date));
                if($cal > $best_duration){
                    $best_duration = $cal;
                    $best_id = $row2['id'];
                    $last_update_at = $row2['updated_at'];
                    $end_time = date("Y-m-d", min(strtotime($row2['end_date']), strtotime($target_end_date)));
                    $start_time = date("Y-m-d",min(strtotime($row2['start_date']), strtotime($target_start_date)));
                }else if ($cal == $best_duration){
                    if(strtotime($last_update_at) > strtotime($row2['updated_at'])){
                        $best_id = $row2['id'];
                    }
                }
            }
        }
        // echo $best_id;
        if($best_id != -1){
            $update_to_db = $sql -> prepare('INSERT INTO `send_mail_list`(`be_volunteer`, `find_volunteer_id`, `start_date`, `end_date`) VALUES (:be_volunteer, :find_volunteer, :start_date, :end_date)');
            $update_to_db -> execute(array('be_volunteer' => $row['id'], 'find_volunteer' => $best_id, 'start_date' => $start_time, 'end_date' => $end_time));
        }
    }

?>
