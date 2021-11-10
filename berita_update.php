<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>

<?php
error_reporting(0);
ob_start();
$link_list='?hal=data_berita';
$link_update='?hal=update_berita';
include "fungsi_thumb.php";
$kode='';
$nama='';
if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	//echo $action;
	//exit;
	
	$judul=$_POST['judul'];
	$berita=$_POST['berita'];
	$tanggal=$_POST['tanggal'];

	 $lokasi_file    = $_FILES['fupload']['tmp_name'];
 	 $tipe_file      = $_FILES['fupload']['type'];
  	$nama_file      = $_FILES['fupload']['name'];
 	
  
	
	if(empty($judul) or empty($berita) or empty($tanggal)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
	
				UploadImage($nama_file);
				$q="insert into berita(judul,berita,tanggal,gambar) values('".$judul."', '".$berita."','".$tanggal."','".$nama_file."')";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			
		}
		if($action=='edit'){
			$q=mysqli_query($con,"select * from berita where id_berita='".$id."'");
			$h=mysqli_fetch_array($q);
			if (!empty($lokasi_file)){
  				UploadImage($nama_file);
				$q="update berita set judul='".$judul."', berita='".$berita."',tanggal='".$tanggal."',gambar='".$nama_file."' where id_berita='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
			else{
		$q="update berita set judul='".$judul."', berita='".$berita."',tanggal='".$tanggal."' where id_berita='".$id."'";
				mysqli_query($con,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($con,"select * from berita where id_berita='".$id."'");
		$h=mysqli_fetch_array($q);
		$judul=$h['judul'];
		$berita=$h['berita'];
		$tanggal=$h['tanggal'];
		$gambar=$h['gambar'];
		
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysqli_query($con,"delete from berita where id_berita='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}
?>

<?php 
if($_GET['action'] == 'edit'){
$cetak='Edit';
}
else{
$cetak='Tambah';

}
?>
<style type="text/css">
	img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 380px;
  height : 250px;
</style>

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><?php echo $cetak ?> Data Berita</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <form role="form" action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
                                        <input name="id" type="hidden" value="<?php echo $id;?>">
                                        <input name="action" type="hidden" value="<?php echo $action;?>">
                                        <?php
                                        if(!empty($error)){ 
                                            echo '<div class="alert alert-danger alert-dismissable">'.$error.'</div>';
                                        } ?>
                                        <div class="form-group">
                                            <label>Judul Berita <span class="required">*</span> </label>
                                            <input class="form-control" placeholder="Enter text" name="judul" type="text" size="50" value="<?php echo $judul;?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Berita</label>
                                            <textarea class="form-control" rows="3" name="berita" id="textarea"><?php echo $berita;?></textarea>
                                        </div>
                                        <div class="form-group">
                                        	<label>Tanggal Posting</label>
                                        	<input class="form-control" type="text" name="tanggal" id="datepicker" value="<?php echo $tanggal;?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Gambar</label>
                                            <input type="file" name='fupload'>
                                            <p class="help-block">* Tipe Icon Harus Tipe PNG</p>
                                        </div>
                                        <br>
                                        <button type="submit" name="save" class="btn btn-success"><i class="icon-ok"></i> Simpan</button> 
                                        <button type="button" name="cancel" class="btn btn-warning" onClick="location.href='<?php echo $link_list;?>'">Batal</button>
                                    </form>
                                </div>

                                <?php
                                if($_GET['action'] == 'edit'){ ?>
                                <div class="col-lg-4">
                                    <form>
                                        <div class="form-group">
                                            <label>Gambar</label><br>
                                            <img src=foto_berita/<?php echo $h[gambar];?> >
                                        </div>
                                    </form>
                                </div>
                            	<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>