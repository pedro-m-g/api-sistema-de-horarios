# Timetables REST API

El proyecto utiliza la versión PHP 7.1 y Composer para el manejo de dependencias.

Para instalar el proyecto, ejecutar:

    composer install

Para ésto, se requiere instalar [Composer](http://composer.org). Para iniciar el servidor de
prueba, ejecutar el comando

    ./server

Este comando iniciará el servidor en el puerto 8000 de localhost.

Para instalar la base de datos, ejecutar:

    ./import_db {user} {bd}

Se solicitará la contraseña de la Base de Datos al realizar este comando. De
forma similar, para guardar una nueva versión de la base de datos, ejecute:

    ./export_db {user} {db}
