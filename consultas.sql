CREATE DATABASE `ai` COLLATE utf8_spanish_ci;

CREATE TABLE `ai`. `usuarios`(
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(300) NOT NULL ,
  `identificacion` INT(11) NOT NULL ,
  `tipoid` VARCHAR(100) NOT NULL ,
  `upnombre` VARCHAR(100) NOT NULL ,
  `usnombre` VARCHAR(100) NULL ,
  `upapellido` VARCHAR(100) NOT NULL ,
  `usapellido` VARCHAR(100) NULL ,
  `correo` VARCHAR(300) NOT NULL ,
  `cargo` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE (`usuario`) ,
  UNIQUE (`identificacion`)) ENGINE = InnoDB;

INSERT INTO usuarios (id, usuario, password, identificacion, tipoid, upnombre, usnombre, upapellido, usapellido, correo, cargo)
VALUES (
  NULL ,
  'admin' ,
  '35075a4b409908862828e39ea9d8467defc71285bf6299c46d869222871d4ebfd543c68a5a588374adf36d68284a2b35cb5bd77f0d3fb9b8f84b3c4287657a40' ,
  '80241168' ,
  'Cedula Ciudadanía' ,
  'Ruben' ,
  'Dario' ,
  'Ortiz' ,
  'Gutierrez' ,
  'rubenortizg@gmail.com' ,
  'Administrador'
  );


  INSERT INTO usuarios (id, usuario, password, identificacion, tipoid, upnombre, usnombre, upapellido, usapellido, correo, cargo)
  VALUES (
    NULL ,
    'german' ,
    'adc2f381a19ec61098cf133f02aa300b41ac7c49979997f560a14ba612240f694022ab94433deb60101067175cc9ed015b1d248508d96262954f2a81e545e357' ,
    '14344543' ,
    'Cedula Ciudadanía' ,
    'German' ,
    '' ,
    'Gutierrez' ,
    '' ,
    'gygasociadosltda@hotmail.com' ,
    'Usuario'
    );


    INSERT INTO usuarios (id, usuario, password, identificacion, tipoid, upnombre, usnombre, upapellido, usapellido, correo, cargo)
    VALUES (
      NULL ,
      'gloria' ,
      '6508956845491d639ed7c7cb821bad6ad7600b5bf896a7c214b95199e1d9da11dfd983bae627d9c44dc0ac8825660aff9f856df0d1b3fb1eb383ea030cbd895d' ,
      '21344543' ,
      'Cedula Ciudadanía' ,
      'Gloria' ,
      '' ,
      'Gutierrez' ,
      '' ,
      'gygasociadosltda@hotmail.com' ,
      'Usuario'
      );


CREATE TABLE `ai`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `identificacion` INT(11) NOT NULL ,
  `tipoid` VARCHAR(100) NOT NULL ,
  `pnombre` VARCHAR(100) NOT NULL ,
  `snombre` VARCHAR(100) NULL ,
  `papellido` VARCHAR(100) NOT NULL ,
  `sapellido` VARCHAR(100) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `correo` VARCHAR(100) NULL ,
  `telfijo` VARCHAR(100) NULL ,
  `celular` VARCHAR(100) NULL ,
  `ciudad` VARCHAR(100) NULL ,
  `tipo` VARCHAR(100) NULL ,
  `banco` VARCHAR(100) NULL ,
  `tcuenta` VARCHAR(100) NULL ,
  `ncuenta` VARCHAR(100) NULL ,
  `notas` TEXT NULL ,
  `idusuario` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`identificacion`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`inmuebles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `matricula` VARCHAR(100) NOT NULL ,
  `tipo` VARCHAR(100) NOT NULL ,
  `direccion` VARCHAR(200) NULL ,
  `ciudad` VARCHAR(100) NULL ,
  `valor` INT(11) NULL ,
  `descripcion` TEXT NULL ,
  `idpropietario` INT(11) NOT NULL ,
  `idusuario` INT(11) NOT NULL ,
  PRIMARY KEY (`id`),
  UNIQUE (`matricula`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`recibos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `nrecibo` INT(11) NOT NULL ,
    `valorpago` INT(11) NOT NULL ,
    `ciudad` VARCHAR(100) NULL ,
    `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `idarrendatario` INT(11) NOT NULL ,
    `idinmueble` INT(11) NOT NULL ,
    `iperiodo` DATE NOT NULL ,
    `fperiodo` DATE NOT NULL ,
    `idusuario` INT(11) NOT NULL ,
    `concepto` VARCHAR(200) NULL ,
    PRIMARY KEY (`id`),
    UNIQUE (`nrecibo`)) ENGINE = InnoDB;

  CREATE TABLE `ai`.`egresos` (
      `id` INT(11) NOT NULL AUTO_INCREMENT ,
      `negreso` INT(11) NOT NULL ,
      `valorpago` INT(11) NOT NULL ,
      `ciudad` VARCHAR(100) NULL ,
      `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
      `idarrendatario` INT(11) NOT NULL ,
      `idinmueble` INT(11) NOT NULL ,
      `iperiodo` DATE NOT NULL ,
      `fperiodo` DATE NOT NULL ,
      `idusuario` INT(11) NOT NULL ,
      `concepto` VARCHAR(200) NULL ,
      PRIMARY KEY (`id`),
      UNIQUE (`negreso`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`ingresos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `ningreso` INT(11) NOT NULL ,
    `valorpago` INT(11) NOT NULL ,
    `ciudad` VARCHAR(100) NULL ,
    `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `idarrendatario` INT(11) NOT NULL ,
    `idinmueble` INT(11) NOT NULL ,
    `iperiodo` DATE NOT NULL ,
    `fperiodo` DATE NOT NULL ,
    `idusuario` INT(11) NOT NULL ,
    `concepto` VARCHAR(200) NULL ,
    PRIMARY KEY (`id`),
    UNIQUE (`ningreso`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`contratos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `ncontrato` INT(10) NOT NULL ,
  `finicio` DATE NOT NULL ,
  `ffin` DATE NOT NULL ,
  `duracion` VARCHAR(100) NOT NULL ,
  `idarrendatario` INT(10) NOT NULL ,
  `idarrendador` INT(10) NOT NULL ,
  `canon` VARCHAR(100) NOT NULL ,
  `idinmueble` INT(20) NOT NULL ,
  `periodicidad` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `ai`.`econceptos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `negreso` INT(10) NOT NULL ,
  `valorconcepto` VARCHAR(100) NOT NULL ,
  `codigo` INT(20) NOT NULL ,
  `tipo` INT(20) NOT NULL ,
  `concepto` VARCHAR(300) NULL ,
  `observaciones` TEXT NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `ai`.`iconceptos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `ningreso` INT(10) NOT NULL ,
  `valorconcepto` VARCHAR(100) NOT NULL ,
  `codigo` INT(20) NOT NULL ,
  `tipo` INT(20) NOT NULL ,
  `concepto` VARCHAR(300) NULL ,
  `observaciones` TEXT NULL ,
  PRIMARY KEY (`id`)) ENGINE = InnoDB;
