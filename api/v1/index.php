<?php
    session_start();
    // if($_SESSION['name'] == "Admin"){
    if(isset($_GET['id'])){
        $id = +$_GET['id'];
        include 'db/config.inc.php';
        $sql = 'SELECT * FROM `admin_user` WHERE id = '.$id;
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        // if($mysqli_rows_nums($result) != 0) {
        if ($count == 0) {
            $mmm = ['status'=>false, 'data'=> 'No data available', 'result'=> 'Not found', 'code'=>'404'];
            echo json_encode($mmm, 128);
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                unset($row["Password"]);
                if(isset($_SESSION['admin'])){
                    // echo $_SESSION['name'];
                    if(isset($_SESSION['name'])){
                        if($row['Username'] == $_SESSION['name']){
                            $status = "online";
                        } else {
                            $status = "offline";
                        }
                    } else {
                        $status = "offline";
                    }
                } else {
                    $status = "offline";
                }
                $row = array_merge($row,["status"=>"$status"]);
                $arr[] = $row;
            }
            // include("api.php");
            $nnn = ['status' =>true, 'data'=>$arr, 'result'=> 'found', 'code'=>'200', 'api'=>$_SERVER["PHP_SELF"]."?".$_SERVER['QUERY_STRING']];
            print_r(json_encode($nnn, 128));
        }
    } else {
        $mmm = ['status'=>false, 'data'=> 'bad parameter', 'result'=> 'Bad Request', 'code'=>'400', 'time' => time()];
        // echo json_encode($mmm, 128);
        include 'api.php';
    }
    header('Content-Type: application/json; charset=utf-8');
    // header('content-encoding: gzip');
    header('content-security-policy: default-src "none"');
    // 440
    // }
?>
