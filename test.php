<?php


if(isset($_POST['submit']))
{

$xml= new DOMDocument('1.0');
$xml->load('m.xml');
$rootfit=$xml->getElementsByTagName("member")->item(0);
// creatte root
$member=$xml->createElement("member");
// creet first kin of members
$fit=$xml->createElement("fit");
// $member->appendChild($fit);
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

$xml->save("m.xml");
 echo"<xmp>".$xml->saveXML()."</xmp>";
header('Location:showxmlrules.php');
}