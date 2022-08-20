<?php
include('../DB.php');

foreach ($_REQUEST as $key => $val) {
    $$key = $val;
};

function check_id_controller()
{
    global $conn;
    global $today;
    // $year = date('Y') - 1911;
    // $month = intval(date('n'));
    // print_r("--------------");
    // echo gettype($year);
    // echo gettype($month);


    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };

    $sql_exist = "SELECT * FROM `remark` WHERE `Stu_ID` = '$user_id'";
    $row = $conn->query($sql_exist);
    $result_exist = $row->fetchAll(PDO::FETCH_ASSOC);
    // echo $sql_exist;
    // print_r("---------------");
    // print_r($result_exist);

    if (empty($result_exist)) {
        $sql_add = "INSERT INTO `remark`( `Year`, `Month`, `Stu_ID`) 
                    VALUES ($year,$month,'$user_id')";
        $row = $conn->prepare($sql_add);
        $row->execute();
        echo json_encode(array("data" => "", "status" => '200', "message" => "成功"));
    } else {
        $sql_check = "SELECT * FROM `schedule` WHERE `Year` = $year AND `Month` = $month AND `Stu_ID` = '$user_id'";
        $row = $conn->query($sql_check);
        $result = $row->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            echo json_encode(array("data" => "", "status" => '200', "message" => "成功"));
        } else {
            echo json_encode(array("data" => "", "status" => '404', "message" => "當月工作表，已上傳過。如要更改，請到查詢做修改"));
        }
    }
}

//新增
function add_data_controller()
{
    global $conn;
    global $today;

    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };
    // print_r($_REQUEST);

    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 8; $j++) {
            if ($i == 0) {
                $date = "星期一";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES (         $year, $month, '$date', '$user_id','$user', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } elseif ($i == 1) {
                $date = "星期二";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                VALUES ($year, $month, '$date', '$user_id','$user', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } elseif ($i == 2) {
                $date = "星期三";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES ($year, $month, '$date', '$user_id','$user', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } elseif ($i == 3) {
                $date = "星期四";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES ($year, $month, '$date', '$user_id','$user', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } else {
                $date = "星期五";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES ($year, $month, '$date', '$user_id','$user', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            }
        }
    }
    echo json_encode(array("data" => "", "status" => '200', "message" => "成功"));
};

//新增(修改)
function readd_data_controller($id)
{
    global $conn;
    global $today;

    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };
    // print_r($_REQUEST);

    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 8; $j++) {
            if ($i == 0) {
                $date = "星期一";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES (         $year, $month, '$date', '$id','$name', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } elseif ($i == 1) {
                $date = "星期二";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                VALUES ($year, $month, '$date', '$id','$name', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } elseif ($i == 2) {
                $date = "星期三";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES ($year, $month, '$date', '$id','$name', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } elseif ($i == 3) {
                $date = "星期四";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES ($year, $month, '$date', '$id','$name', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            } else {
                $date = "星期五";
                $sql = "INSERT INTO `schedule`(`Year`, `Month`, `Day`, `Stu_ID`,`Stu_name`, `series`)
                               VALUES ($year, $month, '$date', '$id','$name', '" . $schedule[$i][$j] . "');";
                //    print_r($sql);
                $row = $conn->prepare($sql);
                $row->execute();
            }
        }
    }
    // echo json_encode(array("data" => "", "status" => '200', "message" => "成功"));
};


//修改
function edit_data_controller()
{
    global $conn;
    global $today;
    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };

    $sql = "DELETE FROM `schedule` 
                WHERE `year` = $year
                AND   `month` = $month
                AND    `Stu_name` = '$name'";
    $row = $conn ->prepare($sql);
    $row-> execute();

    $sql_id = "SELECT `Stu_ID` FROM `remark`
                WHERE `Stu_name` = '$name'";
    $row = $conn->query($sql_id);
    $result_id = $row->fetchAll(PDO::FETCH_ASSOC);

    // echo $result_id;

    $id = $result_id[0]['Stu_ID'];
    // print_r($id);

    
    readd_data_controller($id);

    echo json_encode(array("data" => "", "status" => '200', "message" => "成功"));
}

//取名字
function sel_name_controller(){
    global $conn;
    global $today;
    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };

    $sql = "SELECT DISTINCT  `Stu_name` 
            FROM `schedule` WHERE `Year` = $year AND `Month` = $month";
    $row = $conn->query($sql);
    $result = $row->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}

//刪除
function delete_data_controller(){

    global $conn;
    global $today;
    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };

    $sql = "DELETE FROM `schedule` 
                WHERE `year` = $year
                AND   `month` = $month
                AND    `Stu_name` = '$name'";
    $row = $conn ->prepare($sql);
    $row-> execute();

    echo json_encode(array("data" => "", "status" => '200', "message" => "成功"));
}

$OpType();
