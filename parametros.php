<?php 
namespace p2p;
require 'vendor/autoload.php';
require 'src/p2p.php';
require 'key.php'; // archivo de variables Trankey, login


$obj= new P2P;
$obj->createAuth($wsdl, $login, $tranKey,$location,$additional=null); //metodo para retornar el auth
$bancos=$obj->getListBanks();// metodo para retornar el listado de bancos

$pagador=array(
    'document'=>$document,
    'documentType'=>$documentType,
    'firstName'=>$name,
    'lastName'=>$surname,
    'company'=>'',
    'emailAddress'=>$email,
    'city'=>$ciudad,
    'province'=>'Atlantico',
    'phone'=>'',
    'country'=>'Colombia',
    'mobile'=>$mobile,
);

$cobrador=array(
    'document'=>'32134433',
    'documentType'=>'CC',
    'firstName'=>'Deivis',
    'lastName'=>'Martinez',
    'company'=>'',
    'emailAddress'=>'davidmartinezbolivar@gmail.com',
    'city'=>$ciudad,
    'province'=>'Atlantico',
    'phone'=>'',
    'country'=>'Colombia',
    'mobile'=>'3007158444',
);

$pagador=$obj->createPerson($pagador);

$cobrador=$obj->createPerson($cobrador);


$additionalData=array(
    'name'=>'0001',
    'value'=>'prueba'
);

$payment=array(
    'bankCode'=>$bankCode,
    'bankInterface'=>$interfase,
    'returnURL'=>'http://'.$_SERVER['HTTP_HOST'],
    'reference'=>'p'.time(),
    'description'=>'Pago web',
    'language'=>'es',
    'currency'=>'COP',
    'totalAmount'=>$total,
    'taxAmount'=>$subtotal,
    'devolutionBase'=>$taxes,
    'tipAmount'=>'',
    'payer'=>$pagador,
    'buyer'=>$pagador,
    'shipping'=>$cobrador,
    'additionalData'=>$additionalData,
    'ipAddress'=>'127.0.0.1',
    'userAgent'=>$_SERVER['HTTP_USER_AGENT'],
 );

$Request=$obj->createPSETransactionRequest($payment);
$status=$obj->executeTransaction();
header('Location: '.$status['Success']);



        