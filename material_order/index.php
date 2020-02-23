<?PHP
include_once('../connect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <title>Material</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1>
                <div class="logo">Admin</div>
            </h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="./Home.php"><span class="fa fa-home mr-3"></span> หน้าหลัก</a>
                </li>
                <li>
                    <a href="./ManageMember/Main.php"><span class="fa fa-user-circle mr-3"></span> จัดการสมาชิก</a>
                </li>
                <li>
                    <a href="./ManageBuy/Manage/Main.php"><span class="fa fa-book mr-3"></span> จัดการซื้อสินค้าหน้าร้าน</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-book mr-3"></span> จัดการจองสินค้า</a>
                </li>
                <li>
                    <a href="./ManageStock/Main.php"><span class="fa fa-archive mr-3"></span> การจัดการคลังสินค้า</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-file-text mr-3"></span> รายงาน</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-times mr-3"></span> ออกจากระบบ</a>
                </li>
            </ul>
        </nav>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <p>
                                        <h4>จัดการข้อมูลวัสดุ</h4>
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </nav>
                    <form class="form-inline" method="GET" id="form" action="">
                        <input class="form-control w-50 p-2 ml-1" name="search" type="search" value="" placeholder="กรอกชื่อสินค้าที่ต้องการค้นหา" aria-label="Search">
                        <button class="btn btn-outline-primary ml-3" type="submit"><i class="fas fa-search"></i> Search </button> <button class="btn btn-outline-danger ml-3" action="product.php" type="submit"><i class="fas fa-eraser"></i> Reset</button>
                    </form>
                    <a href="MatOrder_manager/MatOrder_create.php" class="btn btn-success mb-2 float-right"><i class="fas fa-plus-circle"></i> เพิ่มสินค้า </a>

                    <!-- Table -->
                    <table class="table table-bordered text-center">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">วันที่</th>
                                <th scope="col">ชื่อวัสดุ</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">ราคาต่อหน่วย</th>
                                <th scope="col">ราคารวม</th>
                                <th scope="col">ที่จัดเก็บ</th>
                                <th scope="col">ประเภท</th>
                                <th scope="col">ชื่อจำหน่าย</th>
                                <th scope="col">เบอร์โทรจำหน่าย</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $search = isset($_GET['search']) ? $_GET['search'] : '';
                            $sql = "SELECT
                    material_order.mt_id,
                    material_order.mt_buydate,
                    material_order.mt_name,
                    material_order.mt_amount,
                    material_order.mt_UnitPrice,
                    material_order.mt_price,
                    material_order.mt_location,
                    mattype.mtype_name,
                    dealer.dl_name,
                    dealer.dl_phone
                FROM
                    material_order
                INNER JOIN mattype ON material_order.mtype_id = mattype.mtype_id
                INNER JOIN dealer ON material_order.dl_id = dealer.dl_id WHERE mt_name LIKE '%$search%'";
                            $result = $conn->query($sql);
                            $num = 0;
                            while ($row = $result->fetch_assoc()) {
                                $num++;
                            ?>
                                <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $row['mt_buydate']; ?></td>
                                    <td><?php echo $row['mt_name']; ?></td>
                                    <td><?php echo $row['mt_amount']; ?></td>
                                    <td><?php echo $row['mt_UnitPrice']; ?> บาท</td>
                                    <td><?php echo $row['mt_price']; ?> บาท</td>
                                    <td><?php echo $row['mt_location']; ?></td>
                                    <td><?php echo $row['mtype_name']; ?></td>
                                    <td><?php echo $row['dl_name']; ?></td>
                                    <td><?php echo $row['dl_phone']; ?></td>
                                    <td>
                                        <a href="product_manage/edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning ">
                                            <i class="fas fa-edit"></i> แก้ไข
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product_manage/detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger ">
                                            <i class="fas fa-trash-alt"></i> ลบ
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>