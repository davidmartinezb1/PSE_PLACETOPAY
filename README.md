# P2P

- Los datos de conexión a la base de datos se encuentran en el archivo
  - config.php

- Los datos de Login, Trankey, Wsdl y Endpoint se encuentran en el archivo
  - key.php

##############################################################################  

Nombre de la BD: p2p
Estructura de la base de datos p2p

CREATE TABLE `transacciones` (
  `transaccion_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `responseCode` varchar(255) DEFAULT NULL,
  `responseReasonCode` varchar(255) DEFAULT NULL,
  `responseReasonText` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaccion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


######################################################################################

Para que la funcionalidad de la prueba sea correcta, es necesario tener encuenta, que se tienen que configurar los accesos a la base de datos 
y tener instaladas algunas extensiones de php necesarias para ejecutar de forma correcta los wsdl 
y las funcionalidades del ORMs para utilizar el motor de la BD MYSQL con Illuminate, a continuación se addjuntan las extensiones requeridas para 
ejecutar las funcionalidades.


/*
    Archivos de configuración:
        - config.php   = datos de conexión a la base de datos y host
        - key.php  =  datos de trankey, login, wsdl y Endpont (estos valores están predefinidos)


    Extensiones requeridas:

        - extension=php_mbstring.dll
        - extension=php_mysqli.dll
        - extension=php_openssl.dll
        - extension=php_pdo_mysql.dll
        - extension=php_pdo_oci.dll
        - extension=php_soap.dll
*/
