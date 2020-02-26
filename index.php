<?php
// HEADER
include("layouts/header.php");

//NAVBAR
include("layouts/navbar.php");

//MENU
include("layouts/menu.php");
?>
<!-- Content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-center text-dark DataTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">ชื่อวัสดุ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">ที่จัดเก็บ</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $search = isset($_GET['search']) ? $_GET['search'] : '';
                  $sql = "SELECT * FROM `material_stock` WHERE mstock_name LIKE '%$search%'";
                  $result = $condb->query($sql);
                  $num = 0;
                  while ($row = $result->fetch_assoc()) {
                    $num++;
                  ?>
                    <tr>
                      <td><?php echo $num; ?></td>
                      <td><?php echo $row['mstock_name']; ?></td>
                      <td><?php echo $row['mstock_amount']; ?></td>
                      <td><?php echo $row['mstock_location']; ?></td>
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
    </div>
  </section>
</div>
<!-- End Content -->
<?php
//FOOTER
include("layouts/footer.php");
?>