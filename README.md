## Descripción del Proyecto

Esta aplicación web permite gestionar productos mediante un sistema CRUD (Crear, Leer, Actualizar y Eliminar). Los atributos de cada producto incluyen nombre, precio y categoría. La aplicación cuenta con una interfaz de usuario intuitiva, donde podrás agregar nuevos productos, listar los existentes, actualizar sus detalles y eliminar productos de manera sencilla. Además, se utiliza la librería SweetAlert para mostrar alertas interactivas, mejorando la experiencia del usuario.

## Requisitos Previos
Antes de ejecutar la aplicación, asegúrate de tener instalados los siguientes programas en tu sistema:

- **XAMPP** (para Apache y MySQL).
- Composer (gestor de dependencias de PHP).
- **PHP** (ya viene incluido con XAMPP).
- **Un navegador web** (como Chrome, Firefox, etc.).

## Instalación

### Paso 1: Clonar el repositorio
Clona el repositorio de tu proyecto desde GitHub en tu máquina local. Puedes hacerlo utilizando el siguiente comando en tu terminal:

```bash
git clone https://github.com/danybasulto/crud-laravel.git
```

### Paso 2: Configuración de XAMPP

- Inicia XAMPP  y asegúrate de que Apache y MySQL estén en funcionamiento.
- En la carpeta htdocs de XAMPP (normalmente ubicada en C:\xampp\htdocs), coloca el directorio del repositorio clonado.

### Paso 3: Instalación de Dependencias con Composer

- Navega hasta la carpeta del proyecto en tu terminal. Por ejemplo:

```bash
cd C:\xampp\htdocs\nombre-del-repositorio
```

- Instalar las dependencias de Laravel utilizando Composer con el siguiente comando:

```bash
composer install
```

### Paso 4: Configuración del archivo *.env*

- Copia el archivo .env.example y renómbralo a .env:

```bash
cp .env.example .env
```

- Abre el archivo .env y configura la conexión a la base de datos MySQL de XAMPP. Debería verse algo similar a esto:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=root
DB_PASSWORD=
```

Asegúrate de que DB_DATABASE sea el nombre de la base de datos que usarás en MySQL. Si no tienes una base de datos creada, créala a través de phpMyAdmin en http://localhost/phpmyadmin.

### Paso 5: Generar la Clave de la Aplicación

- Ejecuta el siguiente comando para generar la clave de la aplicación:

```bash
php artisan key:generate
```

### Paso 6: Migrar las Tablas a la Base de Datos

- Asegúrate de que tu base de datos esté configurada correctamente y, si es necesario, ejecuta las migraciones para crear las tablas:

```bash
php artisan migrate
```

### Paso 7: Ejecutar el Servidor Local

- Para ejecutar la aplicación, utiliza el siguiente comando:

```bash
php artisan serve
```

- Una vez ejecutado, abre tu navegador y visita:

```bash
http://localhost:8000
```

## Funcionalidades del Sistema

### 1. Listado de Productos

En la página principal de la aplicación, se mostrarán todos los productos almacenados en la base de datos. La lista incluirá el nombre, precio y categoría de cada producto. Puedes hacer clic en cada producto para editar o eliminar su información.

### 2. Agregar un Nuevo Producto

Haz clic en el botón "Agregar Producto" para acceder a un formulario donde podrás ingresar los datos de un nuevo producto.

Los campos que debes completar son:

- Nombre del Producto.
- Precio (debe ser un valor numérico).
- Categoría (puede ser seleccionada desde un listado predefinido).

Una vez completados los campos, haz clic en "Guardar" para agregar el producto a la base de datos.

Si algún campo no es completado correctamente, aparecerá una alerta de SweetAlert notificando el error.

### 3. Editar un Producto

Para editar un producto, haz clic en el botón "Editar" correspondiente al producto que deseas modificar.

Actualiza los campos necesarios y guarda los cambios.

Si el proceso es exitoso, verás una alerta de SweetAlert indicando que los cambios se realizaron correctamente.

### 4. Eliminar un Producto

Para eliminar un producto, haz clic en el botón "Eliminar".

Confirmarás la eliminación en una ventana emergente de SweetAlert.

Una vez confirmado, el producto será eliminado de la base de datos y recibirás una alerta de confirmación.