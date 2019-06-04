CREATE DATABASE epd_labdata;
USE epd_labdata;

CREATE TABLE usuarios(
    id          INT(10)         auto_increment  not null,
    nombre      varchar(100) not null, 
    apellidos   varchar(100),
    email       varchar(255) not null, 
    password    varchar(255) not null,
    rol         varchar(20) not null,
    fecha_reg   date not null,
    imagen      varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'webservices@pixelmediahn.com', 'PixelWebMaster2k18$', 'admin', CURDATE(), NULL);

CREATE TABLE clientes(
    id          INT(10)         auto_increment not null,
    admin_id    INT(255)        not null,
    nombre      varchar(100)    not null, 
    apellidos   varchar(100), 
    email       varchar(255)    not null, 
    password    varchar(255)    not null, 
    empresa     varchar(100),
    ciudad      varchar(100),
    vendedor    varchar(100),
    fecha_reg   date not null, 
    CONSTRAINT pk_clientes PRIMARY KEY(id),
    CONSTRAINT fk_cliente_admin FOREIGN KEY(admin_id) REFERENCES usuarios(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

INSERT INTO clientes VALUES(NULL, '1', 'Allan', 'Samayoa', 'allan.samayoa@gmail.com', 'Shialebeouf30', 'Familiar', 'San Pedro Sula', 'Dayana Melendez', CURDATE());
INSERT INTO clientes VALUES(NULL, '1', 'Josue', 'Fiallos', 'mercadeo@pixelmediahn.com', 'LoremIpsunDolor2k19$', 'PixelMedia', 'San Pedro Sula', 'Dayana Melendez', CURDATE());

CREATE TABLE proyectos(
    id          INT(255)    auto_increment not null,
    admin_id    INT(255)     not null,
    cliente_id  INT(255)     not null,
    nombre      varchar(100) not null,
    ciudad      varchar(100),
    descripcion text,
    fecha_crea  date           not null, 
    CONSTRAINT  pk_proyectos PRIMARY KEY(id),
    CONSTRAINT  fk_proyecto_admin FOREIGN KEY(admin_id) REFERENCES usuarios(id),
    CONSTRAINT  fk_proyecto_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id)
)ENGINE=InnoDb;

INSERT INTO proyectos VALUES(NULL, 5, 1, 'Subestacion Bermejo', 'San Pedro Sula', 'Una subestacion con la capacidad de 50KW por hora', CURDATE());
INSERT INTO proyectos VALUES(NULL, 5, 1, 'Termica Occidente', 'Santa Rosa de Copan', 'La termica que brinda energia a todo Copán', CURDATE());
INSERT INTO proyectos VALUES(NULL, 5, 1, 'Represa el Coyolito', 'Yoro', 'Represa capaz de llevar 25kw hora', CURDATE());
INSERT INTO proyectos VALUES(NULL, 5, 1, 'Estación Solar Nacaome', 'Nacaome, Valle', 'Granja Solar de 90 Kms2 produciendo 10Kw por Km2', CURDATE());


CREATE TABLE equipos(
    id          INT(255)    auto_increment not null,
    proyecto_id INT(255)     not null,
    nombre      varchar(100) not null,
    marca       varchar(100) not null,
    modelo      varchar(100) not null,
    serie       varchar(100) not null,
    fabricante  varchar(100) not null,
    descripcion text,
    fecha_crea  date not null, 
    imagen      varchar(255),
    CONSTRAINT  pk_equipos PRIMARY KEY(id),
    CONSTRAINT  fk_equipo_proyecto FOREIGN KEY(proyecto_id) REFERENCES proyectos(id)
)ENGINE=InnoDb;

INSERT INTO equipos VALUES(NULL, 1, 'TRANSFORMADOR', 'GENERAL ELECTRIC', 'PEGASO', 'KGB-254012', 'GE-JAPON', 'El transformador de la nueva generación', CURDATE(), null);
INSERT INTO equipos VALUES(NULL, 1, 'SELECCIONADORA', 'WESTINGHOUSE', 'ROCKETEER', 'CIA-841229', 'WH-USA', 'La seleccionadora más eficiente del mercado', CURDATE(), null);

CREATE TABLE informes(
    id                  INT(255)        auto_increment not null,
    proyect_id          INT(255)        not null,
    equipo              varchar(100)    not null,
    serie               INT(255)        not null,
    fecha_informe       date            not null, 
    result_electricas   INT(3)          not null,
    recom_electricas    VARCHAR (255),
    result_aceite       INT(3)          not null,
    recom_aceite        VARCHAR (255),
    archivo             VARCHAR (255),
    CONSTRAINT  pk_informes PRIMARY KEY(id),
    CONSTRAINT  fk_informe_proyecto FOREIGN KEY(proyect_id) REFERENCES proyectos(id)
)ENGINE=InnoDb;

CREATE TABLE pruebas(
    id                  INT(255)        auto_increment not null,
    equipo_id           INT(255)        not null,
    nombre              varchar(100)    not null,
    abreviacion         varchar(100)    not null,
    tipo_prueba         INT(2)          not null,
    resultado           INT(3)          not null,
    fecha_prueba        date            not null,
    archivo             VARCHAR (255)   not null,
    CONSTRAINT  pk_pruebas PRIMARY KEY(id),
    CONSTRAINT  fk_prueba_equipo FOREIGN KEY(equipo_id) REFERENCES equipos(id)
)ENGINE=InnoDb;