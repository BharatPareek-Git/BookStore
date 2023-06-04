<?php 
	//Start Sesseion
	session_start();

	//Define Constants
	define('SITEURL','http://localhost/OnlineBookStore/');
	define('LOCALHOST','localhost');
	define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','book_store');

    //DB connect
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
?>