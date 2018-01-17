<?php
include_once('../SPL_MODULE_STEFAN.php');
spl_autoload_register('my_autoloader');
session_start();
$dbhost = 'localhost';
$dbuser = 'tester';
$dbpass = 'tester';
$dbname = 'web_project_pie';

if(isset($_POST['nrmesaje'])){
    $nrMesaje = $_POST['nrmesaje'];
    //echo "\n nrmesaje: $nrMesaje \n";
}

if(isset($_POST['message'])){
    $message = $_POST['message'];
    //echo "\n message: $message ---\n";
}else{
    $message="";
}



$link  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //echo "aici->>>>>>>>>>>>>> ",isset($_SESSION['onClick']);
$db_host      = $dbhost;       // hostname
$db_name      = $dbname;       // databasename
$db_user      = $dbuser;       //  username
$db_user_pw   = $dbpass;       //  password
$con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $db_user_pw);
$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8

if(isset($_POST['message'])){

    if($message != "")
    {
        if(isset($_SESSION['objUSER'])){
            $userObj = $_SESSION['objUSER'];
            $numeUser= $userObj->getNume();
            $userObj->setLoggedDateChat();
            $time = $userObj->getLoggedDateChat();
        }
        $stmt = $con->prepare("INSERT INTO web_project_pie.chat (Username,Text) VALUES (:numeUser, :message);");
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':numeUser', $numeUser, PDO::PARAM_STR);
        //$stmt->bindParam(':time', $time, PDO::PARAM_STR);
        $stmt->execute();
    }
   // unset($_SESSION['onClick']);
}

        $id = $_SESSION['id'];

        if ($nrMesaje==2) {
            //echo "\n 1 ACUMA ID MAX ESTE  $id \n";
            $sql2 = "SELECT max(Id) FROM chat;";
            $result2 = mysqli_query($link, $sql2);
            while ($row3 = mysqli_fetch_row($result2)) {
                $id = $row3[0];
                $_SESSION['id'] = $row3[0];
            }
            $id = 0;
        }

    //echo "\n 2 ACUMA ID MAX ESTE  $id \n";
    $userObj = $_SESSION['objUSER'];
    $time = $userObj->getLoggedDateChat();
    //echo $time."<br>";
//    $sql1 = "SELECT Text,Id,Username,Time FROM chat WHERE TIME > $time";
//    $result = mysqli_query($link,$sql1);
//    $row_cnt = mysqli_num_rows($result);
//    $userObj->setLoggedDateChat();

$stmt = $con->prepare("SELECT *  FROM web_project_pie.chat WHERE TIME > :time");
$stmt->bindParam(':time', $time, PDO::PARAM_STR);
$stmt->execute();
$arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
//if ($result) {
//print_r($arrValues);
foreach ($arrValues as $row){
//    echo sizeof($row);
    echo "<div class='chat friend'><div class='user-photo'></div><p class='chat-msg'>($row[Username]) $row[Text]</p></div>";
    $userObj->setLoggedDateChat();
}
//    while ($row = $stmt->fetchAll(PDO::FETCH_COLUMN, 0)) {
//        echo sizeof($row);
//        echo "<div class='chat friend'><div class='user-photo'></div><p class='chat-msg'>($time $row[2]) $row[0]</p></div>";
//    }
//}

//echo $row_cnt;
//
//    if($row_cnt!=00) {
//        while($row1 = mysqli_fetch_row($result)){
//            echo "<div class='chat friend'><div class='user-photo'></div><p class='chat-msg'>($row1[2]) $row1[0]</p></div>";
//        }
//        $sql2 = "SELECT max(Id) FROM chat;";
//        $result2 = mysqli_query($link, $sql2);
//        while ($row3 = mysqli_fetch_row($result2)) {
//            $id = $row3[0];
//            $_SESSION['id'] = $row3[0];
//        }
//        $id = 0;
//    }

//    echo "\n aici nu exista sesiunea $id \n";
//    $sql2 = "SELECT Text,Id FROM chat WHERE Id > $id";
//    $result2 = mysqli_query($link,$sql2);
//
//    while($row2 = mysqli_fetch_row($result2)){
//        echo "<div class='chat friend'><div class='user-photo'></div><p class='chat-msg'>$row2[0]</p></div>";
//        echo "\naici de n  2ori \n";
//    }


//if($id==0){
//    $sql2 = "SELECT max(Id) FROM chat;";
//    $result2 = mysqli_query($link,$sql2);
//    while($row3 = mysqli_fetch_row($result2)){
//        $id = $row3[0];
//        $_SESSION['id'] = $row3[0];
//    }
//}





?>