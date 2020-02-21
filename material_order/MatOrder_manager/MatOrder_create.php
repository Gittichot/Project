<?PHP
include_once('../../connect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <title>Material</title>
    
    <script>
        // ตรวจสอบการกรอกข้อมูลชนิดที่ไม่ช่ตัวเลข
        function IsNumeric(sText, obj) {
            var ValidChars = "0123456789";
            var IsNumber = true;
            var Char;
            for (i = 0; i < sText.length && IsNumber == true; i++) {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1) {
                    IsNumber = false;
                }
            }
            if (IsNumber == false) {
                alert("กรุณากรอกเฉพาะตัวเลข 0-9");
                obj.value = sText.substr(0, sText.length - 1);
            }
        }
    </script>

    <!--  -->
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            <b>กรอกข้อมูลการสั่งซื้อสินค้า</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pname" name="pname" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="p_id" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="p_id" name="p_id" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกจำนวนสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ราคาต่อหน่วย</label>
                                <div class="col-sm-9">
                                    <input id="price" name="price" type="text" class="form-control" onKeyUp="IsNumeric(this.value,this)" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกราคาต่อหน่วย
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numproduct" class="col-sm-3 col-form-label">ราคารวมสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numproduct" name="numproduct" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกราคารวมสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="loation" class="col-sm-3 col-form-label">ที่จัดเก็บสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="loation" name="loation" rows="4" required></input>
                                    <div class="invalid-feedback">
                                        กรุณากรอกที่จัดเก็บสินค้า
                                    </div>
                                </div>
                            </div>
                            <?php

                            ?>
                            <div class="form-group row">
                                <label for="dl_insurance" class="col-sm-3 col-form-label">ชื่อผู้จำหน่าย</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="dl_id" name="dl_user" required>
                                        <option value="" disabled selected>----- กรุณาเลือก -----</option>
                                        <?php $sql = "SELECT * FROM `dealer`";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $row['dl_id']; ?>"><?php echo $row["dl_name"]; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกชื่อผู้จำหน่าย
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dl_date" class="col-sm-3 col-form-label">วันที่รับสินค้ามา</label>
                                <div class="col-sm-9">      
                                    <input type="datetime-local" class="form-control" id="dl_date" name="dl_date" value="" required> 
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวันที่รับสินค้ามา (เดือน / วัน / ปี)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer text-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="ยืนยัน">
                        <a class="btn btn-danger" href="../">ย้อนกลับ</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>