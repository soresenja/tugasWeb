<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
	$login = [
		[
			'username' => 'zami',
			'password' => '123'
		],
		[
			'username' => 'rizky',
			'password' => '123'
		]
	];
	
	// echo $login[0]['username'];

foreach ($login as $data) {
	if($username==$data['username'] && $password==$data['password']){
		$_SESSION['alert']="Selamat berhasil login";
		header('location:dashboard.php');
		die();
	}else{
		$_SESSION['alert']="Oops Username atau password Salah";
		header('location:index.php');
		die();
	}
}
?>