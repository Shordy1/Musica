DROP DATABASE IF EXISTS music_app;

CREATE DATABASE music_app;

USE music_app;

CREATE TABLE rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50)
);

CREATE TABLE trabajador ( 
    id_trabajador INT AUTO_INCREMENT PRIMARY KEY,
    rut VARCHAR(10),
    correo VARCHAR(100),
    contra VARCHAR(30),
    nombre VARCHAR(50),
    id_rol INT,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

CREATE TABLE sucursal ( 
    id_sucursal INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(10),
    direccion VARCHAR(100),
    id_trabajador INT,
    FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
);


CREATE TABLE producto ( 
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(200),
    marca VARCHAR(100),
    modelo VARCHAR(100)
);

CREATE TABLE stock ( 
    id_stock INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT,
    precio INT,
    descuento INT, # en porcentaje %
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    id_sucursal INT,
    FOREIGN KEY (id_sucursal) REFERENCES sucursal(id_sucursal)
);


CREATE TABLE orden ( 
    id_orden INT AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(100),
    id_producto INT
);


CREATE TABLE prod_orden ( 
    id_prod_orden INT AUTO_INCREMENT PRIMARY KEY,
    cantidad INT,
    id_producto INT,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    id_orden INT,
    FOREIGN KEY (id_orden) REFERENCES orden(id_orden)
);

CREATE TABLE prod_carrito ( 
    id_prod_carrito INT AUTO_INCREMENT PRIMARY KEY,
    cantidad INT,
    precio INT,
    id_stock INT,
    FOREIGN KEY (id_stock) REFERENCES stock(id_stock)
);

CREATE TABLE carrito_compra ( 
    id_carrito_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_prod_carrito INT,
    FOREIGN KEY (id_prod_carrito) REFERENCES prod_carrito(id_prod_carrito),
    id_cliente INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE cliente ( 
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    rut_cliente VARCHAR(10),
    correo VARCHAR(100),
    nombre VARCHAR(100),
    contra VARCHAR(255),
    direccion VARCHAR(100)
);


CREATE TABLE pedido ( 
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    estado VARCHAR(100),
    id_carrito_compra INT,
    FOREIGN KEY (id_carrito_compra) REFERENCES carrito_compra(id_carrito_compra)
);

CREATE TABLE despacho ( 
    id_despacho INT AUTO_INCREMENT PRIMARY KEY,
    tipo_despacho VARCHAR(100),
    id_pedido INT,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
);



#inserciones
INSERT INTO rol (nombre_rol) VALUES ("Bodeguero"); 
INSERT INTO rol (nombre_rol) VALUES ("Vendedor"); 
INSERT INTO trabajador ( rut, correo, contra, nombre, id_rol) VALUES ("20168548-2","ad@ad.cl","1234","Bodeguero",1);
INSERT INTO trabajador ( rut, correo, contra, nombre, id_rol) VALUES ("22528548-2","ad2@ad2.cl","122434","Vendedor",2);

