<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--webfonts-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/login.css">
	<title>The Login-Animated Website Template | Home :: w3layouts</title>
	<!--//webfonts-->
</head>

<body>
<?php
    session_start(); 
        include ('admin/include/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if (isset($_POST['submit'])) { 
            /**
             * กำหนดตัวแปรเพื่อมารับค่า
             */
            $username = $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            /**
             * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
             * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
             */
            $sql = "SELECT * FROM `tb_admin` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $time = date('d-m-Y H:i:s');
            /**
             * ตรวจสอบการเข้าสู่ระบบ
             */
            if(!empty($row)){

                $_SESSION["userid"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["status"] = $row["status"];
                                
                if($_SESSION["status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                  Header("Location: admin/");
                }else{  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                    echo "<script>";
                    echo "alert(\" ไม่มีสิทธิ์เข้าถึงระบบ \");"; 
                    echo "window.history.back()";
                    echo "</script>";
                    header('Refresh:0; url=index.php');
                }
            }else{
              echo "<script>";
              echo "alert(\" Username หรือ  Password ของคุณไม่ถูกต้อง \");"; 
              echo "window.history.back()";
              echo "</script>";
              header('Refresh:0; url=index.php');
            }
  }   
?>
	<br><br><br>
	<div class="login-wrap">
		<div class="login-html">
			<form action="" method="POST">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><b>Login</b></label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
				<div class="login-form mt-3">
					<div class="sign-in-htm">
						<div class="group">
							<label for="user" class="label">USERNAME</label>
							<input name="username" class="input" id="username" type="username" class="form-control" placeholder="USERNAME" required="" autofocus="">
						</div>
						<div class="group">
							<label for="pass" class="label">Password</label>
							<input name="password" class="input" id="password" type="password" class="form-control" placeholder="Password" required="">
						</div>
						<br>
						<input type="submit" name="submit" class="button" value="Sign In">
						<br>
						<div class="hr">
						</div>
					</div>
			</form>
</body>

</html>