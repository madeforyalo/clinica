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