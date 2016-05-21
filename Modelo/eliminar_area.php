<!DOCTYPE html>
<html>
    <head>
        <title>SGCE</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="../Scr/jquery-2.2.0.js"></script>
        <script type="text/javascript" src="../Scr/moment.min.js"></script>
        <script type="text/javascript" src="../Scr/bootstrap.js"></script>
        <script type="text/javascript" src="../Scr/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="../Scr/validator.js"></script>
        <link type="text/css" rel="stylesheet" href="../Css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="../Css/letras.css">
        <link type="text/css" rel="stylesheet" href="../Css/modals.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <?php
        if(isset($_GET["id"]))
            $id = $_GET['id'];
        ?>


        <div class="modal fade" data-keyboard="false" data-backdrop="static" id="dropfail" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-has-error">
                        <h4 class="modal-title">Mensaje de alerta</h4>
                    </div>
                    <div class="modal-body">
                        <p>El área seleccionada tiene solicitudes de citas asociadad. Error al eliminar</p>
                    </div>
                    <div class="modal-footer">
                        <!--
                        <button type='button' class='btn btn-warning' data-dismiss='modal' onclick="window.location =<?php //echo"'../Modelo/eliminar_area.php?id=$id&lol=1'" ?>;">
                            Si
                        </button>
                        -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location = '../Vista/AdministrarAreas.php';">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" data-keyboard="false" data-backdrop="static" id="drop" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-has-success">
                        <h4 class="modal-title">Mensaje de notificación</h4>
                    </div>
                    <div class="modal-body">
                        <p>Se han eliminado el área exitosamente</p>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location = '../Vista/AdministrarAreas.php';">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <?php
    include("abre_conexion.php");
                                //Recibimos por POST los datos procedentes del formulario          


                                if(isset($_GET["lol"])){
                                    $lol = $_GET["lol"];
                                    //echo $lol;
                                    $query = "delete from solicitud where idarea = $id";
                                    mysqli_query($link, $query);
                                    $query1 = "delete FROM area WHERE idarea = $id";
                                    mysqli_query($link, $query1); 

        ?>
        <script>
            $("#drop").modal();
        </script>
        <?php
                                }else{
                                    //echo "NO hay LOL";
                                    $query = "select * from solicitud where idarea=$id";
                                    $result = mysqli_query($link, $query);
                                    if(($row = mysqli_fetch_array($result, MYSQLI_ASSOC))>0){
        ?>
        <script>
            $("#dropfail").modal();
        </script>
        <?php

                                    }else{
                                        $query1 = "delete FROM area WHERE idarea = $id";
                                        mysqli_query($link, $query1);           
        ?>
        <script>
            $("#drop").modal();
        </script>
        <?php

                                    }

                                }

                                include("cierra_conexion.php");  
        ?>
    </body>
</html>
