create database clinica;
use clinica;

create table roles(
rol_id int primary key,
rol_desc varchar(15));

insert into roles values(1, "Admin"), (2,"Secretarie"), (3, "Doctor");

select * from roles;

create table usuarios(
usu_id int auto_increment primary key,
usu_nombre varchar(50),
usu_apellido varchar(50),
usu_usuario varchar(50),
usu_pass varchar(50),
usu_rol int,
foreign key (usu_rol) references roles(rol_id));

insert into usuarios values (null, "Gonzalo", "Rojas", "grojas", "pass.123", 1),
							(null, "Matias", "Vicente", "mvicente", "pass.123", 2),
                            (null, "Sofia", "Peralta", "speralta", "pass.123", 3);
                            
select * from usuarios;

drop table pacientes;
create table pacientes(
pac_id int auto_increment primary key,
pac_nom varchar(50),
pac_ape varchar (50),
pac_dni int (10),
pac_fecha date,
pac_gene varchar (1),
pac_tel int (15),
pac_mail varchar (50));

insert into pacientes values (null, "Gonzalo", "Rojas", 35329399, '90-08-09', "M", 1540767894, "made@clinica.com");
delete from pacientes where pac_id= 6;
select * from pasientes;

create table turnos(
tur_id int primary key auto_increment,
tur_doc int,
tur_pas int,
tur_fecha int,
tur_hora int,
foreign key (tur_doc) references usuarios(usu_id),
foreign key (tur_pas) references pasientes(pas_id),
foreign key (tur_hora) references horarios(hora_id));

create table horarios(
hora_id int primary key auto_increment,
hora_hora time);

CREATE TABLE doctor (
    doc_id INT PRIMARY KEY auto_increment,
    doc_nom VARCHAR(50),
    doc_ape VARCHAR(50));
    
CREATE TABLE especialidades (
    esp_id INT PRIMARY KEY auto_increment,
    esp_nom VARCHAR(50)
);
CREATE TABLE docxesp (
    docxesp_id int primary key auto_increment,
    doc_id INT,
    esp_id INT,
    FOREIGN KEY (doc_id) REFERENCES doctor(doc_id),
    FOREIGN KEY (esp_id) REFERENCES especialidades(esp_id)
);
CREATE TABLE turnos (
    tur_id INT PRIMARY KEY,
    doc_id INT,
    tur_hi TIME,
    tur_hf TIME,
    tur_Fecha DATE,
    FOREIGN KEY (doc_id) REFERENCES doctor(doc_id)
);

