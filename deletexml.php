<?php


$xml= new DOMDocument('1.0');
$xml->load('xml/m.xml');
$c_sport=$_GET['sport'];
echo $c_sport;
$xpath=new DOMXPATH($xml);

foreach ($xpath->query("/member/fit[sport='$c_sport']") as $node ){

	$node->parentNode->removeChild($node);

}

 $xml->formatoutput=true;
$xml->save("xml/m.xml");