<?php
    //เชื่อมต่อ Database
    $conn = new mysqli('localhost','root','','thaiorange');
     //ตั้งค่าภาษาไทย
    $conn->set_charset('utf8');
    //ตรวจสอบว่า Database เชื่อมต่อสำเร็จหรือไม่
    if ($conn->connect_errno){
        echo "Connect Error :".$conn->connect_error;
        exit();    }

    if ($conn->connect_error){
        die("Connection failed" . $conn->connect_error);

    }

    echo $conn->connect_error;
    echo '<br>';
    echo $conn->connect_error;

?>