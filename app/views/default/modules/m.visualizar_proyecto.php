<div class="section bgcolor noover">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message">
                    <h3>Información del proyecto</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<section class="section">
    <div class="container">
        <!--Nombre del proyecto -->
            <h3>Proyecto: </h3>
            <div id="nomproy">
                <h4 style="color:#2C2C2C"><?php echo $tsArray['NOMPROY']?></h4>
            </div>
        <!--Integrantes del proyecto-->
            <h3>Integrantes del proyecto:</h3>
            <div id="nomusuario">
            <?php if ($tsArray!=''){?>
            <?php foreach($tsArray2 as $data): ?>
                <ul>
                    <li><h5 style="color:#2C2C2C"><?php echo $data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT'];?></h5> </li>
                </ul>
            <?php endforeach;}
            else{
                echo('<h3>No hay integrantes registrados en el proyecto</h3>');
            }?>
            </div>
        <!--Estado del proyecto-->
            <h3>Estado del proyecto:</h3>
            <div id="estado">
            <h4 style="color:#2C2C2C"><?php if($tsArray['ESTADO']=='A'){echo 'Activo';}else{echo 'Finalizado';}?></h4>
            </div>
        <!--Fecha de inicio-->
            <div id="inicio">
            <h3>Fecha de inicio del proyecto:</h3>
            <h4 style="color:#2C2C2C"><?php $date= new DateTime($tsArray['FEINIPRO']); echo date_format($date,'d/m/Y'); ?></h4>
            </div>
        <!--Fecha de finalizacion-->
            <h3>Fecha de finalización del proyecto:</h3>
            <div id="fin">
            <h4 style="color:#2C2C2C"><?php $date= new DateTime($tsArray['FEFINPRO']); echo date_format($date,'d/m/Y'); ?></h4>
            </div>
        <!--Descripcion del proyecto-->     
            <div id="descripcion">      
            <h3>Descripción:</h3>
            <h4 style="color:#2C2C2C"><?php echo $tsArray['DESCPROY']?></h4>
            </div>
            <p><a href="index.php?action=modProy&idProy=<?php echo $tsArray['IDPROYECTO'] ?>"><button type="submit" name="editar" class="btn btn-default" role="link" >Modificar proyecto</button></a></p>
            <p><a href="index.php?action=generarPDF&idProy=<?php echo $tsArray['IDPROYECTO'] ?>"><button type="submit" name="editar" class="btn btn-default" role="link" >Generar Informe </button></a></p>            
            
            <hr id="invis1" style="color:#2C2C2C">
        <!--Tabla de actividades-->
        <?php if ($tsArray3!=''){?>
            <table class="table" width="100%" heigth="90px">
                <h3 style="color:#2C2C2C">Actividades del proyecto:</h3>
                <tr>
                <td>Nombre de la actividad</td>
                <td>Descripción de la actividad</td>
                <td></td>
                </tr>
                <?php foreach($tsArray3 as $data2):?>
                <tr>
                <td><?php echo $data2['NOMACTIVIDAD']?></td>
                <td><?php echo $data2['DESCACT']?></td>
                <td><a href="index.php?action=verActividad&idAct=<?php echo $data2['IDACTIVIDAD']?>"><button type="submit" name="editar" class="btn btn-default" role="link" >Visualizar actividad</button></a></td> 
                </tr>
                <?php endforeach; ?>
                
            </table>
                <?php }
                else {
                    echo('<h3>No hay actividades registradas en el proyecto</h3>');
                }?>
            <p><a href="index.php?action=crearAct&idProy=<?php echo $tsArray['IDPROYECTO'] ?>"><button type="submit" name="crear" class="btn btn-default" role="link" >Crear actividad</button></a></p>
            
                                <!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
    </div><!-- end container -->
</section>
