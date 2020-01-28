<?php
    session_start(); //ประกาศ การใช้งาน session
    session_destroy(); // ลบตัวแปร session ทั้งหมด
    echo "<script> window.confirm('Are you sure to logout?');</script>";
    header('location:index.php'); // redirect ไปที่หน้า index.php
?>