<?php
    namespace p2p;
    require 'vendor/autoload.php';
    require 'src/p2p.php';
    require 'start.php';

    $obj= new P2P;
    $data=$obj->getTransacciones();
    if(count($data)){
        print"<pre>".print_r($data,1).print"</pre>";
    }else{
        Print "<h2>No se encontraron registros</h2>";
    }
?>
   
   