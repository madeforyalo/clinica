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

create table turnos(
tur_id int primary key auto_increment,
tur_doc int,
tur_pas int,
tur_esp int,
tur_fecha date,
tur_hora time,
foreign key (tur_esp) references especialidades(esp_id),
foreign key (tur_doc) references doctor(doc_id),
foreign key (tur_pas) references pacientes(pac_id));

CREATE TABLE doctor (
    doc_id INT PRIMARY KEY auto_increment,
    doc_nom VARCHAR(50),
    doc_ape VARCHAR(50));
    
CREATE TABLE especialidades (
    esp_id INT PRIMARY KEY auto_increment,
    esp_nom VARCHAR(50)
);


