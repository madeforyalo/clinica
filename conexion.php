<?php

function conectar(){
    $host="localhost";
    $user="root";
    $pass="";
    $bd="clinica";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}

function todo(){
    $conn=conectar();
    $sqlMostrar= "SELECT * FROM pacientes;";                    
    $query=mysqli_query ($conn, $sqlMostrar);    
    return $query;
}

function buscar(){
    $conn=conectar();
    $buscar=$_GET['txtBuscar'];
    $sql= "SELECT * FROM pacientes WHERE pac_id=$buscar;";
    $query=mysqli_query ($conn, $sql);
    return $query;
} 

function especialidad(){
    $conn=conectar();
    $sql= "SELECT * FROM especialidades";
    $query=mysqli_query ($conn, $sql);
    return $query;
}

function doctor(){
    $conn=conectar();
    $sql= "SELECT * FROM doctor";
    $query=mysqli_query ($conn, $sql);
    return $query;
}

?>