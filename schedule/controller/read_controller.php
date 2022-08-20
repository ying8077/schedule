<?php
include('../DB.php');

foreach ($_REQUEST as $key => $val) {
    $$key = $val;
};

function sel_work_data_controller()
{
    global $conn;
    global $today;
    $year = date('Y') - 1911;
    $month = intval(date('n'));

    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };

    $arr_1 = array(
        "Day" => "星期一",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_2 = array(
        "Day" => "星期二",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_3 = array(
        "Day" => "星期三",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_4 = array(
        "Day" => "星期四",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_5 = array(
        "Day" => "星期五",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );


    // $arr['Day'] = array();
    // $arr['Day']['series'] = array();
    // $arr['Day']['Stu_name'] = array();
    $arr_tmp = array();

    $sql_id = "SELECT DISTINCT `Stu_ID`, `Stu_name` FROM `schedule` WHERE `Year` = $year AND `Month` = $month";
    $row = $conn->query($sql_id);
    $result_id = $row->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT `Stu_ID`, `Stu_name`,`series`, `Day`  
            FROM schedule WHERE `Year` = $year AND `Month` = $month ";
    // print_r($sql);
    $row = $conn->query($sql);
    $result = $row->fetchAll(PDO::FETCH_ASSOC);

    $len = count($result);
    // print_r("--------------");

    $len_id = count($result_id);
    $len_dist = $len / $len_id;


    for ($n = 0; $n < $len_id; $n++) {
        for ($i = 0; $i < $len; $i++) {
            if ($result_id[$n]['Stu_ID'] == $result[$i]['Stu_ID']) {
                $tmp = array(
                    "Stu_name" => $result_id[$n]['Stu_name'],
                    "Day" => $result[$i]['Day'],
                    "Series" => $result[$i]['series'],
                );
                array_push($arr_tmp, $tmp);
            }
        }
    }




    $name = "";
    $t_array = array();
    for ($d = 0; $d < $len_dist; $d++) {
        for ($a = 0; $a < $len_id; $a++) {
            if ($arr_tmp[$d + $a * 40]['Series'] == 'X') {
                $arr_tmp[$d + $a * 40]['Stu_name'] = " ";
            }
            $t_arr = array(
                'Name' => $arr_tmp[$d + $a * 40]['Stu_name'],
            );
            array_push($t_array, $t_arr);
            // $name .= $arr_tmp[$d+$a*40]['Stu_name']."\r\n";
        }
    }

   

    $s = 1;
    $w = 1;
    for ($c = 0; $c < $len; $c += $len_id) {
        for ($i = 0; $i < $len_id; $i++) {
            $name .= $t_array[$c + $i]['Name'] . " ";
        }
        if ($w == 1) {
            $arr_1['Series'][$s] = trim($name);
        }
        if ($w == 2) {
            $arr_2['Series'][$s] = trim($name);
        }
        if ($w == 3) {
            $arr_3['Series'][$s] = trim($name);
        }
        if ($w == 4) {
            $arr_4['Series'][$s] = trim($name);
        }
        if ($w == 5) {
            $arr_5['Series'][$s] = trim($name);
        }
        $name = "";
        if ($s == 8) {
            $s = 1;
            $w++;
        } else {
            $s++;
        }
    }

    $arr = array($arr_1, $arr_2, $arr_3, $arr_4, $arr_5);
    // array_push($array,$name);
    // print_r($arr_tmp[0]['Stu_ID'].",".$arr_tmp[40]['Stu_ID']);
    // print_r($arr_1);

    // print_r($arr);





    echo json_encode($arr);
}

// 單一工讀生班表(修改用)
function sel_single_work_data_controller(){
    global $conn;
    global $today;
    $year = date('Y') - 1911;
    $month = intval(date('n'));

    foreach ($_REQUEST as $key => $val) {
        global $$key;
    };

    $arr_1 = array(
        "Day" => "星期一",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_2 = array(
        "Day" => "星期二",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_3 = array(
        "Day" => "星期三",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_4 = array(
        "Day" => "星期四",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $arr_5 = array(
        "Day" => "星期五",
        "Series" => array(
            "1" => "",
            "2" => "",
            "3" => "",
            "4" => "",
            "5" => "",
            "6" => "",
            "7" => "",
            "8" => "",
        )
    );

    $sql = "SELECT `Row_id`,`Stu_ID`, `Stu_name`,`series`, `Day`  
            FROM schedule 
            WHERE `Year` = $year AND `Month` = $month AND `Stu_name` = '$name'";
    // print_r($sql);
    $row = $conn->query($sql);
    $result = $row->fetchAll(PDO::FETCH_ASSOC);

    $arr_tmp = array();

    $len = count($result);

    for($i=0; $i<$len; $i++){
        $tmp =  array(
            "Row_id" => $result[$i]['Row_id'],
            "Series" => $result[$i]['series'],
            "Day" => $result[$i]['Day'],
        );
        array_push($arr_tmp, $tmp);
    }


    // print_r("-------------");
    // print_r($arr_tmp);

    $s = 1;
    for ($c = 0; $c < $len; $c++) {
        if ($arr_tmp[$c]['Day'] == "星期一") {
            $arr_1['Series'][$s] = $arr_tmp[$c]['Series'];
        }
        if ($arr_tmp[$c]['Day'] == "星期二") {
            $arr_2['Series'][$s] = $arr_tmp[$c]['Series'];
        }
        if ($arr_tmp[$c]['Day'] == "星期三") {
            $arr_3['Series'][$s] = $arr_tmp[$c]['Series'];
        }
        if ($arr_tmp[$c]['Day'] == "星期四") {
            $arr_4['Series'][$s] = $arr_tmp[$c]['Series'];
        }
        if ($arr_tmp[$c]['Day'] == "星期五") {
            $arr_5['Series'][$s] =$arr_tmp[$c]['Series'];
        }
        if ($s == 8) {
            $s = 1;
        } else {
            $s++;
        }
    }

    $arr = array($arr_1, $arr_2, $arr_3, $arr_4, $arr_5);
    // print_r($arr);
    echo json_encode($arr);
    
}

$OpType();