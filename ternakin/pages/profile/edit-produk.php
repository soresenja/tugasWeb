<?php 
  require_once"../../config/database.php";
  $title="Profile | ".$_SESSION['user']['nama'];
  require_once"../../templates/header.php";
  $sql = mysqli_query($con,"SELECT * FROM tb_produk WHERE id_hewan='".$_GET['id']."'");
  $data = mysqli_fetch_assoc($sql);
  $sqlProvinsi = mysqli_query($con,"SELECT * FROM tb_provinsi");
  $sqlKota = mysqli_query($con,"SELECT * FROM tb_kota");
  $sqlJenis = mysqli_query($con,"SELECT * FROM tb_produk_jenis WHERE produk_jenis_img IS NULL");
 ?>
 <style type="text/css">
 	.card-profile{
 		margin-top: -120px;
 	}
 </style>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
</head>
<body>
<?php require_once"../../partials/navbar-profile.php"; ?>
<div class="container" style="margin: 100px auto;">
	<div class="jumbotron">
		<div class="d-flex justify-content-between">
			<div class="card card-profile" style="width: 120px;background: #f2f2f2;">
				<img src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" style="width: 100%;">
			</div>
			<div class="card-profile d-flex align-items-center">
				<a href="<?=$_ENV['base_url']?>profile" class="btn btn-success">Profile</a>
			</div>
		</div>
		<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$data['id_hewan']?>">
			<ul class="list-group list-group-flush mt-2">
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Nama Produk</label>
			  		<input type="text" name="nama_produk" class="form-control" value="<?=$data['nama_produk']?>">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
  					  <label>Foto Produk</label>
                      <input type="file" name="foto[]" id="myInput" class="form-control-file" accept="image/png , image/jpeg" multiple>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Jenis Produk</label>
			  		<select name="jenis" id="jenis" class="form-control selectpicker" data-live-search="true">
			  			<?php 
			  				while ($dataJenis = mysqli_fetch_array($sqlJenis)) {
			  					?>
			  					<option value="<?=$dataJenis['id_jenis_produk']?>" <?=($dataJenis['id_jenis_produk']==$data['id_jenis_produk'])?'selected':''?>>
			  						<?=$dataJenis['nama_jenis_produk'];?>
			  					</option>
			  					<?php
			  				}
			  			 ?>
			  		</select>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Jumlah</label>
			  		<input type="number" name="jumlah" class="form-control" value="<?=$data['jumlah']?>">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Harga</label>
			  	</div>
				<div class="input-group mb-2">
			       <div class="input-group-prepend">
			          <div class="input-group-text">Rp.</div>
			       </div>
			        <input type="number" class="form-control" name="harga" value="<?=$data['harga']?>">
		      	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Deskripsi</label>
			  		<textarea class="form-control" name="deskripsi"><?=$data['deskripsi']?></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Catatan</label>
			  		<textarea class="form-control" name="catatan"><?=$data['catatan']?></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Provinsi</label>
			  		<select id="provinsi" name="provinsi" class="form-control selectpicker" data-live-search="true">
	              	<option <?=($data['id_provinsi']==NULL)?'selected':''; ?>>Silahkan pilih provinsi</option>
			  			<?php 
			  				while ($dataProv=mysqli_fetch_array($sqlProvinsi)) {
			  					?>
			  						<option value="<?=$dataProv['id_provinsi']?>" <?=($dataProv['id_provinsi']==$data['id_provinsi'])?'selected':''?>><?=$dataProv['nama_provinsi']?></option>
			  					<?php
			  				}
			  			 ?>
			  		</select>
			  	</div>
			  </li>
			  <li class="list-group-item">
	            <div class="form-group">
	              <label>Kota</label>
	              <select name="kota" id="kota" class="form-control">
	              	<option <?=($data['id_kota']==NULL)?'selected':''; ?>>Silahkan pilih kota</option>
			  			<?php 
			  				while ($dataKota=mysqli_fetch_array($sqlKota)) {
			  					?>
			  						<option value="<?=$dataKota['id_kota']?>" <?=($dataKota['id_kota']==$data['id_kota'])?'selected':''?>><?=$dataKota['nama_kota']?></option>
			  					<?php
			  				}
			  			 ?>
	              </select>
	            </div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Alamat</label>
			  		<textarea class="form-control" name="alamat"><?=$data['alamat']?></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
	            <button type="submit" name="aksi" value="update-produk" class="btn btn-success form-control">Edit Produk</button>
			  </li>
			</ul>
		</form>
	</div>
</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
  	<script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function(){
      		$("#jenis").selectpicker()
      		$("#provinsi").selectpicker()
		      $("#provinsi").on('change',function(){
		        $('#kota').html('<option>Silahkan pilih provinsi</option>')
		        var html
		        let link ="<?=$_ENV['base_url']?>cms-dashboard/api/lokasi"

		        $.ajax({
		          url : link,
		          method:"POST",
		          data:{
		            aksi:'kota',
		            id:$(this).val()
		          },
		          dataType:'json',
		          success:function(data){
		            html += '<option>Pilih Kota</option>'
		            for (var a = 0; a < data.item.length; a++) {
		              console.log(data.item[a])
		              html +='<option value='+data.item[a].id_kota+'>'+data.item[a].nama+'</option>'
		            }
		            $('#kota').html(html)
		          }
		        });
		      });
  		})
  	</script>
</html>