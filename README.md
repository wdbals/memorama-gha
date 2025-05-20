# Probando un sistema heredado

Un juego de memorama educativo hecho con php

## Pasos hechos para levantar el servicio :
1. Instalar php y php-mysqli
  - `sudo apt-get install php php-mysqli` (en Ubuntu)
  - `sudo dnf install php php-mysqli` (en Fedora)
2. Instalar (o iniciar un contenedor) el servidor de base de datos MySQL
  * *En caso de tener un servidor de MySQL*:
    - Crear una base de datos llamada `memorama`
    - importar los archivos sql, en el siguiente orden:
      - `memorama.sql`
      - `memorama_2.sql` // Se modificó para usar la base de datos `memorama`
  * *En caso de tener un contenedor de MySQL*
    - Meter los archivos sql en la carpeta `init-sql`
    - "podman run --rm --name 'php-mysql' \
      -e MYSQL_ROOT_PASSWORD=root \
      -v ./init-sql:/docker-entrypoint-initdb.d \
      -p 3306:3306 \
      mysql:latest"
3. Modificar el archivo `src/core/php/DataBaseManager.php` para que se conecte a la base de datos
4. Ejecutar el servidor php
  - `php -S localhost:8000`

## Mejoras hechas para correr el servicio en un contenedor:
- Se creo un Dockerfile
  - Se instalo php y php-mysqli
- Se creo un docker-compose.yml
- Se creo un servicio para el servidor de base de datos MySQL
- Se creo una carpeta para los sql
  - Se montó la carpeta en el contenedor para su inicialización
  - Se creo una variable de entorno para la contraseña del root
  - Se creo un servicio para el servidor php
- Se cambio el archivo de conexión a la base de datos para que se conecte al servidor de base de datos en el contenedor (db)

### Pasos hechos para levantar el servicio en un contenedor:
1. Correr `podman-compose up -d` para levantar el servicio en un contenedor.
2. Acceder a `localhost:8000` para ver el servicio. (El backend puede tardar en levantarse)
3. Correr `podman-compose down` para bajar el servicio.

## Pasos hechos para ejecutar pruebas unitarias:
- Instalar phpunit
  - `sudo apt-get install phpunit` (en Ubuntu)
- Instalar composer
  - `sudo apt-get install composer` (en Ubuntu)
- Agregar la dependencia de phpunit al proyecto
  - `composer require --dev phpunit/phpunit ^12`
- Asumiendo que se tienen las pruebas unitarias en la carpeta `tests`
- Correr las pruebas
  - `./vendor/bin/phpunit tests`

## Cambios hechos al sistema heredado:
- se movió los archivos del sistema a la carpeta `src`
- Se creó una carpeta `tests` para las pruebas unitarias
- Se creó un Dockerfile
- Se creó un docker-compose.yml
- Se creó un archivo de configuración para phpunit
