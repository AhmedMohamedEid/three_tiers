<?php 

$x=simplexml_load_file("xml/m.xml");
$i=-1;

foreach ($x->children() as $child) {
	
	
    
	$tallf=explode('-',$child->tall);
	$tallf=range($tallf[0], $tallf[1]);
    
	//$tallarr[]=$tallf;

	$weightf=explode('-',$child->weight);
    $weightf=range($weightf[0], $weightf[1]);
    
    //$weightarr[]=$weightf;
    
    $speedf=explode('-',$child->speed);
    $speedf=range($speedf[0], $speedf[1]);
    //$speedarr[]=$speedf; 
   
    $sportf=$child->sport;

	
}

$tallarr;
$weightarr;
$speedarr;
$sportf;




 