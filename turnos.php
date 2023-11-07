<?php 
    require "conexion.php";
    $conn=conectar();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Turnos</h1>
    </div>
    <div class="row">

        <div class="col-2"></div>

        <form action="" method="post" class="form-control col-8 p-4">
            <div class="row">
                <div class="col-3">
                    <label for="txtDni">Ingrese DNI paciente</label>
                    <input type="text" name="txtDni" id="txtDni" placeholder="DNI" class="form-control shadow mt-3"  
                        title="DNI">
                </div>
            
                <div class="col" style="margin-top: 40px;">
                    <button type="submit" class="btn btn-primary" name="buscarPasiente">Buscar</button>
                </div>
            </div>
            <?php 
                if (isset($_POST['buscarPasiente'])){
                    $dni= $_POST['txtDni'];
                    $sql= "SELECT * FROM pacientes WHERE pac_dni = $dni";
                    $query=mysqli_query ($conn, $sql);
                    $registro=mysqli_fetch_assoc($query);
                        if(mysqli_affected_rows($conn)>0){
                            $pac_id= $registro['pac_id']; ?>
                            <div class="row">
                                <div><input type="text" name="paciente" value="<?php echo $registro['pac_id'];?>" style="display: none;"></div>
                                <div class="mt-4 col-3">  
                                    <input type="text" class="form-control shadow" placeholder="<?php echo $registro['pac_dni'];?>" disabled>
                                </div>
                                <div class="mt-4 col-3">
                                    <input type="text" class="form-control shadow" placeholder="<?php echo $registro['pac_ape'] . " " . $registro['pac_nom'];?>" disabled > 
                                </div> 
                                <div class="mt-4 col-3">  
                                    <input type="text" class="form-control shadow" placeholder="<?php echo $registro['pac_tel'];?>" disabled>
                                </div> 
                                <div class="mt-4 col-3">
                                    <input type="text" class="form-control shadow" placeholder="<?php echo $registro['pac_mail'];?>" disabled>
                                </div>
                            </div>  
                            
                    <?php } else { ?>

                        <div class="row">
                            <div class="mt-4 col-4">
                                <p>No se encontro el pasiente</p>
                            </div>
                            <div class="mt-4 col-3">
                                <a href="pacientes.php" class="btn btn-primary" role="button">Agregar pacientes</a>
                            </div>
                        </div>

                    <?php }
                    
                }  
                $esp = especialidad();
                $prof = doctor();
            ?>   
            
        
            <div class="row mt-5 mb-4">
                <div class="col-3">
                    <label for="especialidad">Especialidad:  </label>
                    <select name="especialidad" id="especialidad" class="form-control shadow">
                        <option selected disabled value="0">Seleccione una especialidad...</option>
                        <?php while($row=mysqli_fetch_assoc($esp)){ ?>
                        <option value="<?php echo $row['esp_id'];?>"><?php echo $row['esp_nom'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3">
                    <label for="profesional">Profesional:  </label>
                    <select name="profesional" id="profesional" class="form-control shadow">
                        <option selected disabled value="0">Seleccione un profesional...</option>
                        <?php while($row=mysqli_fetch_assoc($prof)){ ?>
                        <option value="<?php echo $row['doc_id'];?>"><?php echo $row['doc_nom'] . " " . $row['doc_ape'] ;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3">
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" class="form-control shadow">
                </div>
                <div class="col-3">
                    <label for="hora">Hora:</label>
                    <select name="hora" class="form-control shadow">
                        <!-- Genera opciones para las horas desde 8:00 hasta 18:00 -->
                        <?php
                        for ($hora = 8; $hora < 18; $hora++) {
                            for ($minuto = 0; $minuto < 60; $minuto += 30) {
                                $horaFormateada = str_pad($hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($minuto, 2, '0', STR_PAD_LEFT) . ":00";
                                echo "<option value='$horaFormateada'>$horaFormateada</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    
                    <div class="col mt-5">
                        <button type="submit" name="agregueTurno" class="btn btn-primary">agregar turno</button>
                    </div>
                    <div class="col mt-5" >
                        <a href="secretarie.php" class="btn btn-primary" role="button">Volver</a>
                    </div>
                </div>
                </div>
            </div>
            <?php

            if(isset($_POST['agregueTurno'])){
                $pac=$_POST['paciente'];
                $doc=$_POST['profesional'];
                $esp=$_POST['especialidad'];
                $fecha=$_POST['fecha'];
                $hora=$_POST['hora'];

                $sqlTurno="INSERT INTO turnos VALUE (null, $doc, $pac, $esp, '$fecha', '$hora')";
                $queryTurno = mysqli_query($conn, $sqlTurno);

            }
            $turno=turnos();

            ?>
        </form>
        <div class="col-2"></div>
        
        <div class="row mt-4">
            <div class="col">
                <div class="table">
                    <table class="table shadow" >
                        <thead class="table-dark table-striped">
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Paciente</th>
                                <th>Especialidad</th>
                                <th>Doctor</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($registro=mysqli_fetch_array($turno)){ //muestra las filas relacionadas con la posicion
                            ?>
                                    <tr>
                                        <td><?php echo $registro[0]?></td>
                                        <td><?php echo $registro[1]?></td>
                                        <td><?php echo $registro[2] . " " . $registro[3]?></td>
                                        <td><?php echo $registro[4]?></td>
                                        <td><?php echo $registro[5] . " " . $registro[6]?></td>
                                        <td><?php echo $registro[7]?></td>
                                        <td><?php echo $registro[8]?></td>
                                        <td><a href="actualizar.php?id=<?php echo $registro[0]?>" title="Editar" style="margin-right: 15px" ><i class="fa-solid fa-marker"></i></a>                                            
                                        <a href="ver.php?id=<?php echo $registro[0]?>" method="get" title="Borrar"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>                                            
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
    

</div>


    
</div>    
</body>

</html>