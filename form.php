<?php 
    namespace p2p;
    require 'vendor/autoload.php';
    require 'src/p2p.php';
    require 'key.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="js/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, target-densityDpi=device-dpi" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css"><title>Pagos - Place To Pay</title>
        
    </head>

    <body class="html not-front">
        <main id="pagos" class="dashboard">
            <h1>Pagos Electrónicos</h1>
            <section id="info-dato" class="alerta-pago">
                <p>
                    <a href="list-payment-register.php">Listar Transacciones</a>
                </p>
            </section>
            
            <form id="frmDatos" autocomplete="off" enctype="multipart/form-data" method="post" action="/" onSubmit="return validate(this);" name="form">
                
                <div id="personal">
                    <h2>Información de facturación</h2>
                    <input type="checkbox" name="" id="completar">
                    <div class="box-items">
                        <?php
                            $obj= new P2P;
                            $obj->createAuth($wsdl, $login, $tranKey,$location,$additional=null); //metodo para retornar el auth
                            $bancos=$obj->getListBanks();// metodo para retornar el listado de bancos
                            $bancos=json_decode($bancos);
                        ?>
                        <div class="form-item">
                            <label>tipo de persona</label>
                            <select required id="persontype" name="persontype" class="">
                                <option value="0">Persona</option>
                                <option value="1">Empresa</option>
                            </select>
                        </div>	

                        <div class="form-item">
                            <label>Entidad Bancaría</label>
                            <select required id="bankCode" name="bankCode" class="">
                                <?php 
                                    foreach ($bancos as $value) {
                                        ?>
                                            <option value="<?php print $value->bankCode ?>"><?php print $value->bankName ?></option>
                                        <?php
                                    }
                                ?>
                                <option value="0">Persona</option>
                                <option value="1">Empresa</option>
                            </select>
                        </div>

                        <div class="form-item">
                            <label>tipo de documento</label>
                            <select required id="documenttype" name="documenttype" class="" data-plan="CC">
                                <option value="0">Seleccione una Opción</option>
                                <option value="CC">Cédula de ciudadanía</option>
                                <option value="CE">Cédula de Extranjería</option>
                                <option value="NIT">Número de identificación tributaria</option>
                            </select>
                        </div>	

                        <div class="form-item">
                            <label>número de identificación</label>
                            <input class="obj" type="text" id="document" name="document" data-plan="1234567898" value="">
                        </div>	
                    </div>
                        
                    
                    <div class="box-items">
                        <div class="form-item">
                            <label>nombre(s)</label>
                            <input class="obj" type="text" id="name"  name="name" data-plan="David" value="">
                        </div>	

                        <div class="form-item">
                            <label>apellidos</label>
                            <input class="obj" type="text" id="surname"  name="surname" data-plan="Martinez" value="">
                        </div>	
                    </div>
                        
                    <div class="box-items">
                        <div class="form-item">
                            <label>celular</label>
                            <input class="obj" type="number" id="mobile" name="mobile" data-plan="3017296053" value="">
                        </div>	

                        <div class="form-item">
                            <label>e-mail</label>
                            <input class="obj" type="text" id="email"  name="email" data-plan="davidmartinezb1@hotmail.com" value="">
                        </div>	
                    </div>

                    <div class="box-items">
                        <div class="form-item">
                            <label>Ciudad</label>
                            <input class="obj" type="text" id="ciudad" name="ciudad" data-plan="Barranquilla" value="">
                        </div>	

                        <div class="form-item">
                            <label>Dirección DE FACTURACIÓN</label>
                            <input placeholder="" class="obj" type="text" id="direccion"  name="direccion" data-plan="calle 110 # 46 - 90" value="">
                            <span>Ej: Calle 2 # 24c - 45 Apto 1</span>
                        </div>	
                    </div>
                    
                </div>   

                <div id="dato-compra">
                    <h2>Revisión del Pago</h2>
                    <div id="dato-plan">
                        <?php require_once 'detalle_pago.php'; ?>
                        <input type="hidden" name="total" value="53550">       
                        <input type="hidden" name="taxes" value="19">
                        <input type="hidden" name="subtotal" value="10174">                           
                    </div>                    
                </div>       
                
                <div id="action">                                       
                    <input type="submit" id="save-info" name="" value="Confirmar compra">
                </div>                                    
            </form>
            
            <aside id="anonymous-user" class="<?php if($_GET['info']==1){ print 'active'; }?>" >
                <div>
                    <h3 class="mensaje">
                        <?php
                            if($_GET['info']==1){
                                print "Los siguientes campos tienen datos erroneos o incompletos ...<br><br>";
                                if($_GET['name']==0){print "El Nombre ingresado no es valido.<br>";}
                                if($_GET['surname']==0){print "Los Apellidos ingresados no son validos.<br>";}
                                if($_GET['cel']==0){print "El Número de celular ingresado no es valido.<br>";}
                                if($_GET['mail']==0){print "El Email ingresado no es valido.<br>";}
                                if($_GET['docttype']==0){print "Seleccione un tipo de Documento de identificación.<br>";}
                                if($_GET['plan']==0){print "Seleccione uno de los planes disponible.<br>";}
                                if($_GET['ciud']==0){print "La ciudad ingresada no es valida.<br>";}
                                if($_GET['dir']==0){print "La dirección ingresada no es valida.<br>";}
                
                            }
                        ?>
                    </h3>

                </div>
            </aside>
        </main>
    </body>
</html>