<?php
$xml= new DOMDocument('1.0');
$xml->load('xml/m.xml');
$c_sport=$_POST['sport'];
echo $c_sport;
$xpath=new DOMXPATH($xml);
foreach ($xpath->query("/member/fit[sport='$c_sport']") as $node ){
	$node->parentNode->removeChild($node);
}
$xml->formatoutput=true;
$xml->save("xml/m.xml");

$xml= new DOMDocument('1.0');
$xml->load('xml/m.xml');
$rootfit=$xml->getElementsByTagName("member")->item(0);
// creatte root
$member=$xml->createElement("member");

$fit=$xml->createElement("fit");

$tall=$xml->createElement('tall',$_POST['tall']);
$weight=$xml->createElement('weight',$_POST['weight']);
$speed=$xml->createElement('speed',$_POST['speed']);
$sport=$xml->createElement('sport',$_POST['sport']); 

$fit->appendChild($tall);
$fit->appendChild($weight);
$fit->appendChild($speed);
$fit->appendChild($sport);
$rootfit->appendChild($fit);

$xml->formatoutput=true;

$xml->save("xml/m.xml");
echo"<xmp>".$xml->saveXML()."</xmp>";

header("location:showxmlrules.php");