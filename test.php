<?php
$wsdl = "https://test.placetopay.com/soap/pse/?wsdl"; 
$client = new \SoapClient($wsdl,array('trace'=>true));

?>
