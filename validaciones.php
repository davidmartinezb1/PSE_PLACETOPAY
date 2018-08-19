<?php

    $datos=$_POST;
    $mensaje=array();

    if (!preg_match('/^[A-Za-z ñÑáéíóúÁÉÍÓÚ]{3,20}$/', $datos['name'])) {
        //nombre invalido
        array_push($mensaje,"name=0&");
    
    }
    if (!preg_match('/^[A-Za-z ñÑáéíóúÁÉÍÓÚ]{3,40}$/', $datos['surname'])) {
        //apellido invalido
        array_push($mensaje,"surname=0&");
    }
    if (!preg_match('/^[0-9]{1,10}$/', $datos['mobile'])) {
        //celular invalido
        array_push($mensaje,"cel=0&");
    }
    if (!preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $datos['email'])) {
        // email invalido
        array_push($mensaje,"mail=0&");
    }
    // validacion tipo de documento y numero de documento
    if (!in_array($datos['documenttype'],array('CC','CE','NIT'))) {
        // tipo de docuemtno invalido
        array_push($mensaje,"doc=0&");
    }
    if (!preg_match('/^[A-Za-z ñÑáéíóúÁÉÍÓÚ]{3,40}$/', $datos['ciudad'])) {
        //ciudad invalida
        array_push($mensaje,"ciud=0&");
    }
    if (!preg_match('/^[A-Za-z 0-9 #-]{3,40}$/', $datos['direccion'])) {
        //direccion invalida
        array_push($mensaje,"dir=0&");
    }


    //tipo de plan invalido
    if ($datos['documenttype']=="CC") {
        if (!preg_match('/^[1-9]\d{6,8}\-?\d?$/', $datos['document'])) {
            //cedula invalida
            array_push($mensaje,"docttype=0&");
        }
    }
    if ($datos['documenttype']=="CE") {
        if (!preg_match('/^[a-zA-Z]*[1-9]\d{3,7}$/', $datos['document'])) {
            // cedeula de extranjeria invalido
            array_push($mensaje,"docttype=0&");
        }
    }
    if ($datos['documenttype']=="NIT") {
        if (!preg_match('/^\d{3}\-?\d{2}\-?\d{4}$/', $datos['document'])) {
            // nit invalido
            array_push($mensaje,"docttype=0&");
        }
    }

    $num_error=count($mensaje);

    if($num_error > 0){
        $alert="info=1&";
        
        for ($i=0; $i < $num_error; $i++) { 
        $num =$i+1;
        $alert.=$mensaje[$i];
        }
        header('location: index.php?'.$alert);
    }else{
        $documentType=isset($datos['documenttype'])? $datos['documenttype']:'';
        $document=isset($datos['document'])? $datos['mobile']:'';
        $mobile=isset($datos['mobile'])? $datos['mobile']:'';
        $name=isset($datos['name'])? $datos['name']:'';
        $surname=isset($datos['surname'])? $datos['surname']:'';
        $email=isset($datos['email'])? $datos['email']:'';
        $ciudad=isset($datos['ciudad'])? $datos['ciudad']:'';
        $direccion=isset($datos['direccion'])? $datos['direccion']:'';
        $total=isset($datos['total'])? $datos['total']:'';
        $taxes=isset($datos['taxes'])? $datos['taxes']:'';
        $subtotal=isset($datos['subtotal'])? $datos['subtotal']:'';
        $interfase=isset($datos['persontype']) ? $datos['persontype']:'';
        $bankCode=isset($datos['bankCode'])? $datos['bankCode']:'';
        require 'parametros.php';
    }    
