# Pr-ctica-04-Creaci-n-de-una-aplicaci-n-web-usando-PHP-y-Base-de-Datos

Esta practica consiste en conectar una base de datos a una pagina web creada de forma personal.

La base de datos de nombre Hipermedial.
  Contiene dos tablas usuario y correos.
  
  Sentencias sql de la creacion de las tablas.
  
  CREATE TABLE `usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_cedula` varchar(10) NOT NULL,
  `usu_nombres` varchar(50) NOT NULL,
  `usu_apellidos` varchar(50) NOT NULL,
  `usu_direccion` varchar(75) NOT NULL,
  `usu_telefono` varchar(20) NOT NULL,
  `usu_correo` varchar(20) NOT NULL,
  `usu_password` varchar(255) NOT NULL,
  `usu_fecha_nacimiento` date NOT NULL,
  `usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
  `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usu_codigo`),
  UNIQUE KEY `usu_cedula` (`usu_cedula`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  CREATE TABLE correos (
  cor_codigo int(11) NOT NULL AUTO_INCREMENT,
  cor_fecha_hora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  cor_usu_remitente int(11) NOT NULL,
  cor_usu_destinatario int(11) NOT NULL,
  cor_asunto varchar(50) NOT NULL,
  cor_mensaje varchar(255) NOT NULL,
  cor_eliminado varchar(1) NOT NULL DEFAULT 'N',
  COR_fecha_modificacion timestamp NULL DEFAULT NULL,
  PRIMARY KEY (cor_codigo),
  FOREIGN KEY (cor_usu_remitente) REFERENCES usuario(usu_codigo),
  FOREIGN KEY (cor_usu_destinatario) REFERENCES usuario(usu_codigo)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  Verificar el correcto funcionamiento de todos los puntos mencionados en la practica
  
