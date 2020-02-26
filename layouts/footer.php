  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>

  <!-- jQuery -->
  <script src="<?= PLUGINS ?>jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= PLUGINS ?>jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!--  -->


  <!-- Bootstrap 4 -->
  <script src="<?= PLUGINS ?>bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= JS ?>adminlte.js"></script>
  <script src="<?= PLUGINS ?>datatables/jquery.dataTables.js"></script>
  <script src="<?= PLUGINS ?>datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script>
    $('.DataTable').DataTable({
      "oLanguage": {
        "sEmptyTable": "ไม่มีข้อมูลในตาราง",
        "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix": "",
        "sInfoThousands": ",",
        "sLengthMenu": "แสดง _MENU_ แถว",
        "sLoadingRecords": "กำลังโหลดข้อมูล...",
        "sProcessing": "กำลังดำเนินการ...",
        "sSearch": "ค้นหา: ",
        "sZeroRecords": "ไม่พบข้อมูล",
        "oPaginate": {
          "sFirst": "หน้าแรก",
          "sPrevious": "ก่อนหน้า",
          "sNext": "ถัดไป",
          "sLast": "หน้าสุดท้าย"
        },
        "oAria": {
          "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
          "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
        }
      },
      responsive : true
    });
  </script>
  </body>

  </html>