<?php

if (isset($_POST['search'])) { $search = $_POST['search']; if ($search == '') { unset($search);} }


function xren($url) {
  $curl = curl_init();
  $timeout = 3;
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
$youla = 'https://youla.ru/?q=';

function getData($url_xren,$class,$product){
  $dom = new DOMDocument();
  $newurl = xren($url_xren.$product);
  $newurl .= $product;
  @$result = $dom->loadHTML($newurl);
  $xpath = new DOMXPath($dom);
  $nameData = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
  $i = 0;
  $data = array();

  foreach($nameData as $name) {
    //echo $name->nodeValue;
    $data[$i]= $name->nodeValue;
    //echo $name->saveXML($name);
    $i++;
  }
  return $data;
}
function getDataImg($url_xren,$class,$product){
  $dom = new DOMDocument();
  $newurl = xren($url_xren.$product);
  $newurl .= $product;
  @$result = $dom->loadHTML($newurl);
  $xpath = new DOMXPath($dom);
  $nameData = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
  $i = 0;
  $data1 = array();
  require_once 'simple_html_dom.php';
  $data = file_get_html($url_xren.$product);
  foreach($data->find('div.product_item__image img') as $a){
    $data1[$i]=$a;
    $i++;
  }
  return $data1;
}


class objpars {
  var $img;
  var $price;
  var $title;


 


  function getinfo(){
    echo '<div class="obj"> <div class="card">';
    echo $this->img;
    echo "<div class=\"container\"> <p class=\"price\">";
    echo $this->price;
    echo "</p>";
    echo "<h4><b>";
    echo $this->title;
    echo "</b></h4> </div>";
    echo "</div>";
  }
  function setname($img,$title,$price) {
    $this->img = $img;
    $this->title = $title;
    $this->price = $price;
  }
}

$obj1x = array();
$obj2x = array();
$obj3x = array();

$obj1 = array();
$obj2 = array();
$obj3 = array();
$xs = 0;
$counts =0;
for ($i=1; $i <7; $i++) { 
$obj1=getDataImg($youla,"product_item__image",$search);
$obj2= getData($youla,"product_item__description",$search);
$obj3= getData($youla,"product_item__title",$search);
$search .= "&page=".$i;
 $counts += count($obj2);
}

 echo "<h1 style=\"text-align: center\"> Нашлось количества товаров: ".$counts. "</h1>";
foreach ($obj3 as $value){
  $obj = new objpars;
  $obj -> setname($obj1[$xs],$obj3[$xs],$obj2[$xs]);
  $obj -> getinfo();
  $xs++;
}




?>

<style>
.obj {

  margin-left: auto;
  margin-right: auto;
  text-align:center;
  margin-bottom: 50px;
}
p{
  
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 20%;
  border-radius: 5px;
  margin-left: 40%;
  margin-bottom: 50px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.price {
  border-radius: 50px;
  background: lightyellow;
}
img {
  width: 100%;
  border-radius: 5px 5px 0 0;
}
h4  {
  width: 100%;
  border-radius: 5px; 
  background-color: orange;
}
.container {

  padding: 2px 16px;
}


</style>