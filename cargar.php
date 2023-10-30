<?php
    require "conexion.php";
    $conn=conectar();
    $nombre=$_POST ['txtNombre'];
    $apellido=$_POST ['txtapellido'];
    $dni=$_POST ['txtdni'];
    $fechaDeNac=$_POST ['txtFecha'];
    $genero=$_POST ['txtGenero'];
    $tel=$_POST ['txtTelefono'];
    $mail=$_POST ['txtMail'];

    $sql="insert into pacientes(pac_id, pac_nom, pac_ape, pac_dni, pac_fecha, pac_gene, pac_tel, pac_mail)
    values (null, '$nombre', '$apellido', $dni,'$fechaDeNac', '$genero',  $tel, '$mail');";

    $query=mysqli_query($conn,$sql);

    $_SESSION['mensaje'] = 'Los datos se cargaron con exitó!';
    $_SESSION['tipo_mensaje'] = 'success';

    if ($query){
        Header("location: pacientes.php");
    };