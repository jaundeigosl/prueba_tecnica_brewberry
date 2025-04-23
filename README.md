# prueba_tecnica_brewbery
Prueba técnica full-stack (realizada con Laravel)

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

1. **PHP**: Laravel 12 requiere PHP 8.1 o superior.

2. **Composer**: Necesitarás Composer para gestionar las dependencias de PHP.

3. **Servidor Web**: Puedes usar Apache, Nginx o el servidor embebido de PHP.

4. **Base de Datos**: MySQL, PostgreSQL, SQLite o cualquier otra base de datos compatible.

## Clonar el Repositorio

```bash

git clone https://github.com/jaundeigosl/prueba_tecnica_brewberry.git

cd prueba_tecnica_brewbery

cd cerveceria

```
Ya dentro de la carpeta realizamos el siguiente comando para instalar las dependecias de PHP

```bash

composer install

```

Procedemos con la instalacion de las dependecias de javascript

```bash

npm install

```

Ahora se debe de crear un nuevo archivo .env , de manera que se puede copiar el archivo .env.example 
y cambiar los siguientes valores y sustituirlos por los correspondientes

``` ini
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT= 3306 o puerto donde se tenga la conexion a base de datos
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario_base_de_datos
DB_PASSWORD=contraseña_usuario_base_de_datos

```

Ahora procedemos a ejecutar las migraciones

```bash

php artisan migrate

```

Finalmente para levantar el servidor usamos el comando

```bash

composer run dev

```

Ahora nos ubicamos en el navegador en la direccion localhost:8000 donde se debe de visualizar el proyecto

