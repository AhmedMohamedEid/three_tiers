<?php
    
	ini_set('display_errors' , 'On');
	error_reporting(E_ALL);
	
	// Add The conect to Database File
    include 'connect.php';

    $sessionUser = '';
	if(isset($_SESSION['admin_login'])){
		$sessionUser = $_SESSION['admin_login'];
	}
    
	
    // Routse
  //  $file 		= '';
	$css 		= 'style/css/';			// Director Css fils
	$js  		= 'style/js/'; 			// Director js Fils
	//$imgItem    = 'uploaded/itemImg/'; 		// Director img Files
	
	
	
    
    // Include The Impotant File 
	include 'function.php';
	//include $lang .'English.php';
    include  'header.php';
	
// Adding The Navbar For All page without page include $nonavbar
    if (!isset($nonavbar)){include  'navbar.php';}
	