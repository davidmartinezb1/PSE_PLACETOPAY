<?php
    namespace p2p;
    require 'vendor/autoload.php';
    require 'src/p2p.php';
    require 'start.php';
    require 'key.php'; // archivo de variables Trankey, login

    $obj= new P2P;
    $obj->createAuth($wsdl, $login, $tranKey,$location,$additional=null); //metodo para retornar el auth
    $data=$obj->verifyEstatusTransactions();

    print"<pre>".print_r($data,1).print"</pre>";
