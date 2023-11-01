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

function turnos(){
    $conn=conectar();
    $sql= "SELECT turnos.tur_id, pacientes.pac_dni, pacientes.pac_ape, pacientes.pac_nom,
    especialidades.esp_nom, doctor.doc_ape, doctor.doc_nom, tur_fecha, tur_hora
    FROM turnos
    INNER JOIN pacientes ON turnos.tur_pas = pacientes.pac_id
    INNER JOIN especialidades ON turnos.tur_esp = especialidades.esp_id
    INNER JOIN doctor ON turnos.tur_doc = doctor.doc_id;";
    $query=mysqli_query ($conn, $sql);
    return $query;

}

?>