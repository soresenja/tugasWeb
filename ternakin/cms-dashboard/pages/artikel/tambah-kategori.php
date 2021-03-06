  <?php 
    $title="Tambah Kategori";
    require_once"../../../config/database.php";
    require_once"../../templates/head-dashboard.php";
   ?>

  <!-- Query -->
  <?php 
  ?>
  <!-- End Query -->
  <style type="text/css">
    #img-live{
      max-width: 380px;
      margin-bottom: 20px;
      padding:5px;
      border:1px solid #f2f2f2;
      display: none;
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php require_once"../../partials/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          <?php require_once"../../partials/topbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="transition: 0.4s;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
          </div>

          <div class="row">

            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="<?=$_ENV['base_url']?>cms-dashboard/pages/artikel/aksi" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Kategori</label>
                      <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Foto Kategori</label>
                      <input type="file" name="foto" class="form-control-file" id="foto" accept="image/png , image/jpeg">
                    </div>
                    <div id="preview-img">
                      <img src="" id="img-live">
                    </div>
                    <button type="submit" name="aksi" class="btn btn-primary" value="tambah-kategori">Tambah Kategori</button>
                  </form>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php require_once"../../templates/footer-dashboard.php" ?>
  <script type="text/javascript">
    $(document).ready(function(){
      function readURL(input){
        if(input.files && input.files[0])
        {
          var reader = new FileReader();
          reader.onload = function(e)
          {
            $('#preview-img').css({'display':'block'});
            $('#img-live').attr('src', e.target.result);
          }
              reader.readAsDataURL(input.files[0]);
        }
      }
      $('#foto').change(function(){
        readURL(this);
        $("#img-live").css({'display':'block'});
      });
    });
  </script>
</html>
