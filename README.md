OBJETIVO ALCANZADO:
Entender y organizar de una mejor manera los sitios de web en Internet. 
Diseñar adecuadamente elementos gráficos en sitios web en Internet.
Crear sitios web aplicando estándares actuales.

ACTIVIDADES DESARROLLADAS
1.	Generar el diagrama E-R para la solución de la práctica. 

2.	Crear un repositorio en GitHub con el nombre “Practica04-Mi Correo Electrónico”

 
Una vez creado nuestro repositorio podemos realizar  los commit y push por uno de los pasos.

3.	Procedemos a crear nuestra página principal index con 5 páginas más adicionales

Creamos carpetas especificas para guardas nuestras páginas y así mismo para guardar todos nuestras imágenes, archivos php y ajax a utilizar en la página web.

 
4.	Se debe crear páginas web con diseño basándose en la siguientes plantilla.
 





5.	Se crea la base de Datos con nombre hipermedial y se le agrega las tablas de nombre usuario y correos.
 









6.	Sentencias SQL de la estructura de la base de datos.

TABLA USUARIO
 











TABLA CORREO

 















Ñ


















7.	Desarrollo de los requerimientos Usuario con rol user:

a.	Visualiza en su página principal (index.php) el listado de todos los mensajes electrónicos recibidos, ordenador por los más recientes.

 

Primero lo que se realiza es incluir la conexión con nuestra base de datos creada anteriormente, se realiza una sentencia SQL comparando con el código del usuario ingresado, y se ordena por fecha mas reciente con ORDER BY cor_fecha_hora DESC; y se presenta en pantalla todos los correos recibidos.


 




b.	Visualizar el listado de todos los mensajes electrónicos enviados, ordenados por los más recientes.

Se crea la sentencia para saber que mensajes a enviado el usuario ingresado y se ordena de manera mas reciente con ORDER BY cor_fecha_hora DESC; 

Toda la información presentada se la visualiza en una tabla, donde mostrara la fecha de envió, destinatario, asunto y la opción leer.


 























c.	Enviar mensajes electrónicos a otros usuarios de la aplicación WEB.

Se incluye la conexión a nuestra base de datos, y se obtienes los datos de destinatario, asunto y mensaje en variables, se crea la sentencia SQL para la inserción de nuestros campos de mensaje.

 





























d.	Buscar todos los mensajes electrónicos recibidos. La búsqueda se realizará por el correo del usuario remitente y se deberá aplicar Ajax para la búsqueda. 

Se crea nuestro archivo Ajax para realizar la búsqueda de los correos electrónicos recibidos dependiendo el usuario que se haya ingresado, y se envía a nuestro archivo php de nombre buscarre.php

 
























En nuestro archivo buscarre.php realizamos la conexión a nuestra base de datos y creamos la sentencia para buscar por correos electrónicos y presentamos en la tabla los datos a mostrar cómo son fecha, correo del remitente y el asunto además también la opción de leer el mensaje. 

 


En nuestro input autofocus llamamos al evento onkeyup para que cada vez que se vaya insertando una letra nos valla presentando los posibles resultados de la búsqueda y los remplace en la tabla.


 






















e.	Buscar todos los mensajes electrónicos enviados. La búsqueda se realizará por el correo del usuario destinatario y se deberá aplicar Ajax para la búsqueda. 

Se crea nuestro archivo Ajax para realizar la búsqueda de los correos electrónicos recibidos dependiendo el usuario que se haya ingresado, y se envía a nuestro archivo php de nombre buscaren.php

 























En nuestro archivo buscaren.php realizamos la conexión a nuestra base de datos y creamos la sentencia para buscar por correos electrónicos enviados y presentamos en la tabla los datos a mostrar cómo son fecha, correo del destinatario y el asunto además también la opción de leer el mensaje. 

 

En nuestro input autofocus llamamos al evento onkeyup para que cada vez que se vaya insertando una letra nos valla presentando los posibles resultados de la búsqueda y los remplace en la tabla.

 























f.	Modificar los datos de Usuario.

Se incluye nuestra base de datos, y se saca la información del usuario en variables para luego ser ingresadas en nuestra actualización, se crea la sentencia para actualiza los cambios realizados por el usuario incluido la fecha de modificación. 

 




















g.	Cambiar la contraseña del Usuario.

Se incluye la base de datos y se presenta los campos a digitar de la contraseña anterior y la nueva, 
Así mismo se realiza la sentencia SQL para actualizar y se verificar los cambios.

 


8.	Desarrollo de los requerimientos Usuario con rol admin:
h.	No puede ni enviar ni recibir mensajes electrónicos.

En la opción de enviar mensajes de nuestro usuario con rol user hacemos una sentencia donde pregunta si el rol es admin nos presente un mensaje diciendo que no se puede enviar el mensaje.

 


i.	Visualizar en su pagina principal (index.php) el listado de todos los mensajes electrónicos, ordenados por los más recientes.

Primero lo que se realiza es incluir la conexión con nuestra base de datos creada anteriormente, se realiza una sentencia SQL comparando con el código del usuario ingresado, y se ordena por fecha mas reciente con ORDER BY cor_fecha_hora DESC; y se presenta en pantalla todos los mensajes electrónicos.

 


















j.	Eliminar los mensajes electrónicos del usuario con rol “user”.

Puede eliminar cualquier tipo de mensajes por que el usuario admin no puede ni enviar ni recibir ningún mensaje electrónico. 

Se verifica que el usuario que esta logeado sea admin para poder realizar esta acción y se realiza la sentencia SQL

 























k.	Eliminar, modificar y cambiar contraseña de los usuarios con rol “user”.

Así mismo se verificar que el usuario sea de rol admin para realizar estas acciones.

Se incluye nuestra base de datos, y se saca la información del usuario para ser presentadas en pantalla sin opción a ser modificadas, se crea la sentencia para eliminar por el usuario incluido la fecha de modificación. 



  
























Se incluye nuestra base de datos, y se saca la información del usuario en variables para luego ser ingresadas en nuestra actualización, se crea la sentencia para actualiza los cambios realizados por el usuario incluido la fecha de modificación. 

 
























Se incluye la base de datos y se presenta los campos a digitar de la contraseña anterior y la nueva, 
Así mismo se realiza la sentencia SQL para actualizar y se verificar los cambios.

 

l.	Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública. 

Se puede ingresar solo a la carpeta publica porque los demás archivos ya están con verificación de inicio de sesión. 

m.	 Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta                                  admin → vista → admin y admin → controladores → admin.

 

n.	Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin → vista → user y admin → controladores → user 

 


9.	La evidencia del correcto diseño de las paginas HTML usando CSS.
Crear usuario

 
Login

 

Index user

 
Index admin

 
Enviar mensaje 
 
Mensajes Enviados

 
Mi cuenta

 

Usuarios

 
Eliminar Mensajes

 

Modificar Usuario

 

Actualizar Contraseña
 
Eliminar Usuario
 


Leer Mensajes
 

Eliminar Mensaje

 









10.	Evidencia del correcto funcionamiento.

a.	Mensajes recibidos.
 
b.	Mensajes enviados.
 
c.	Enviar Mensaje.
 
d.	Buscar mensaje recibido.
 
e.	Buscar mensaje enviado
 
f.	Modificar Usuario
 
g.	Cambiar contraseña.
 
h.	Agregar Imagen.
 
i.	No puede enviar ni recibir mensaje
 
j.	Mensajes electrónicos
 
k.	Eliminar mensaje

 

l.	Eliminar, modificar y cambiar contraseña.

 
 

11.	Información de GitHub (Usuario y repositorio)
 

URL del repositorio de la práctica 
https://github.com/NikoAP77/Pr-ctica-04-Creaci-n-de-una-aplicaci-n-web-usando-PHP-y-Base-de-Datos


























  
