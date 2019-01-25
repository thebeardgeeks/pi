
<?php

function xren($url) {
    $curl = curl_init();
    $timeout = 5;
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}
   $youla = xren('https://youla.ru/?q=');

    function getData($url_xren,$class,$product){
        $dom = new DOMDocument();
        $newurl = $url_xren;
        $newurl.=$product;
        @$result = $dom->loadHTML($newurl);
        $xpath = new DOMXPath($dom);
        $nameData = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
        $i = 0;
        $data = array();
        foreach($nameData as $name) {
           // $name->nodeValue;
            $data[$i]= $name->nodeValue;
            //$name->saveXML($name);
            $i++;
        }
        return $data;
    }




echo print_r(getData($youla,"product_item__description","iphone"));

?>
