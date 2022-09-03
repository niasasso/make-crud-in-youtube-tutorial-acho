<?php 
	// koneksi database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

	// jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
			VALUES (
				'$_POST[tnim]', 
				'$_POST[tnama]', 
				'$_POST[talamat]', 
				'$_POST[tprodi]')
			");

		if($simpan) //jika simpan sukses
		{
			echo "<script>
					alert('Simpan data sukses!');
					document.location='index.php';
				  </script>";
		}
		else
		{
			echo "<script>
					alert('Simpan data GAGAL!');
					document.location='index.php';
				  </script>";
		}
	}


?>




<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP & MySQL - Bootstrap</title>	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<h1 class="text-center">CRUD PHP & MySQL - Bootstrap</h1>
		<h2 class="text-center">@Ngodingpintar</h2>

		<!-- awal card form -->
		<div class="card mt-3">
		  <div class="card-header bg-primary text-light">
		    Form Input Data Mahasiswa
		  </div>
		  <div class="card-body">
		    <form method="post" action="">

		    	<div class="form-group">
		    		<label>Nim</label>
		    		<input type="text" name="tnim" class="form-control" placeholder="Input Nim anda disini" required>
		    	</div>
		    	<div class="form-group">
		    		<label>Nama</label>
		    		<input type="text" name="tnama" class="form-control" placeholder="Input nama anda disini" required>
		    	</div>
		    	<div class="form-group">
		    		<label>Alamat</label>
		    		<textarea class="form-control" name="talamat" placeholder="Input alamat anda disini"></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label>Program Studi</label>
		    		<select class="form-control" name="tprodi">
		    			<option></option>
		    			<option value="D3-MI">D3-MI</option>
		    			<option value="S1-SI">S1-SI</option>
		    			<option value="S1-TI">S1-TI</option>
		    		</select>
		    	</div>

		    	<button type="submit" class="btn btn-success mt-3" name="bsimpan">Simpan</button>
		    	<button type="reset" class="btn btn-danger mt-3" name="breset">Kosongkan</button>
		    	
		    </form>
		  </div>
		</div>
		<!-- akhir card form -->

		<!-- awal card tabel -->
		<div class="card mt-3">
		  <div class="card-header bg-success text-light">
		    Daftar Mahasiswa
		  </div>
		  <div class="card-body">

		  	<table class="table table-bordered table-striped">
		  		<tr>
		  			<th>No.</th>
		  			<th>NIM</th>
		  			<th>Nama</th>
		  			<th>Alamat</th>
		  			<th>Program Studi</th>
		  			<th>Aksi</th>
		  		</tr>

		  		<?php
		  			$no = 1;
		  			$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
		  			while($data = mysqli_fetch_array($tampil)) :
		  		?>

		  		<tr>
		  			<td><?= $no++; ?></td>
		  			<td><?= $data['nim'] ?></td>
		  			<td><?= $data['nama'] ?></td>
		  			<td><?= $data['alamat'] ?></td>
		  			<td><?= $data['prodi'] ?></td>
		  			<td>
		  				<a href="#" class="btn btn-warning"> Edit </a>
		  				<a href="#" class="btn btn-danger"> Hapus </a>
		  			</td>
		  		</tr>
		  		<?php endwhile; //penutup perulangan while ?>
		  	</table>
		    
		  </div>
		</div>
		<!-- akhir card tabel -->
	</div>

	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>