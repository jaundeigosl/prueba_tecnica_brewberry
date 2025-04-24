# prueba_tecnica_brewbery
Prueba técnica full-stack (realizada con Laravel)

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

1. **PHP**: Laravel 12 requiere PHP 8.1 o superior.

2. **Composer**: Composer para gestionar las dependencias de PHP.

3. **Servidor Web**: Apache.

4. **Base de Datos**: MySQL .

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

## Objetivos

1. **Construir una aplicación web basada en un diseño proporcionado en Figma** 
2. **Consumo datos desde una API pública de cervecerías**
3. **Construir un sistema básico de autenticación de usuarios**

## Tecnologias usadas

**Frontend:** HTML5, CSS3, Javascript , Blade , Tailwind

Para la sección del frontend, aparte de las tecnologias básicas de Html , Css y Javascript, se usaron Blade y Tailwind. Blade es un motor de plantillas incorporado por Laravel que nos permite dividir el diseño en componentes reutilizables de fácil uso. Por otro lado Tailwind permite el aplicar estilos de forma directa y sencilla, tambien facilitando el responsive design.

**Backend:** PHP, Laravel, MySQL.

En la sección del backend se uso PHP con Laravel, el cual es un framework que permite enlazar facilmente el frontend con backend, siendo ideal para aplicaciones de pequeño y mediano tamaño. Laravel cuenta con todas las herramientas necesarias para la creacion y administracion de rutas asi como tambien la implenmentacion de la autorizacion y medidas de seguridad basicas. MySQL es la base de datos ideal al momento de usar Laravel, sin embargo para propositos de este proyecto cualquier gestor de base de datos podria haber servido debido a que lo unico que se almacena son los usuarios y las sesiones.

Laravel por defecto usa autenticacion por sesiones, en este caso fueron implementadas mediante un esquema en la base de datos que permite llevar un control preciso de las sesiones de los usuarios. Al momento de que un usuario inicia y si sus credenciales son validas, entonces el ID del usuario se asocia a la sesion y esta se **Regenera**. Posteriormente al momento de cerrar sesión es eliminado el ID del usuario asociado a la sesión.


Configuracion de las sesiones
```php
// config/session.php
'driver' => 'database',  // Usando base de datos como almacén
'lifetime' => 120,       // Tiempo en minutos
'expire_on_close' => false,
```

Ejemplo de la validacion de credenciales y regeracion de sesión
```php
$credentials = $request->validate([
    'email' => 'required|email|exists:users,email',
    'password' => 'required|string|min:8|max:20'
]);
if(Auth::attempt($credentials)){
    $request->session()->regenerate();
    return redirect()->route('home');

}else{
    return back()->withErrors([
        'email' => 'Credenciales invalidas',
    ])->onlyInput('email');
}
```

Ejemplo de logout

```php
Auth::guard('web')->logout();
$request->session()->invalidate();
$request->session()->regenerateToken();

return redirect()->route('index')
```














