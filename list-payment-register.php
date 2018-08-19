<?php
    namespace p2p;
    require 'vendor/autoload.php';
    require 'src/p2p.php';
    require 'start.php';

    $obj= new P2P;
    $data=$obj->getTransacciones();
    if(count($data)){?>
        <link rel="stylesheet" href="css/table.css">
        <span><a href='/'>Regresar</a></span><br><h1>Listado de Transacciones</h1><hr>
        <table class="paleBlueRows">
            <thead>
                <tr>
                    <th>ID transacci&oacute;n</th>
                    <th>Estado</th>
                    <th>Descripci&oacute;n</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $value) { ?>
                    <tr>
                        <td><?php print $value->transaccion_id; ?></td>
                        <td><?php print $value->status; ?></td>
                        <td><?php print $value->responseReasonText; ?></td>
                        <td><?php print $value->created_at; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    }else{
        Print "<h2>No se encontraron registros</h2>";
    }
?>
   
   