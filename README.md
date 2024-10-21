# TPE - Trabajo Practico Especial WEB 2

## Integrantes

- Nicolás Ledesma
- Abril Crivaro

En este repositorio subiremos todos los archivos correspondientes con el Trabajo Práctico Especial (TPE).

## Descripción

Este proyecto forma parte de la segunda entrega del Trabajo Práctico Especial (TPE) de la carrera TUDAI. El sitio muestra una base de datos que contiene un ranking global de canciones y artistas, con funcionalidades de creación, edición y eliminación tanto de canciones como de artistas. Además, permite la visualización de detalles de cada canción y artista, incluyendo una breve descripcion.

El sitio incluye un sistema de autenticación que permite que solo los usuarios registrados puedan agregar, editar o eliminar canciones y artistas. Si no estás autenticado, puedes navegar por las listas de canciones y artistas, pero no tendrás acceso a las funciones de administración.

## Funcionalidades Principales

- Visualización de las canciones más populares, ordenadas por vistas.
- Vista detallada de cada canción, incluyendo nombre, fecha de lanzamiento, reproducciones y letra.
- Visualización y gestión de artistas, con datos como nombre, nacionalidad, imagen y una descripción.
- Filtrado de canciones por artista.
- CRUD de canciones y artistas (solo para usuarios autenticados).
- Sistema de login y logout.
- Página de "Sobre Nosotros" con detalles sobre los desarrolladores del proyecto.

## Tablas

### La tabla `songs` contiene:
- `id_song`: clave primaria (autoincremental)
- `song_name`: nombre de la canción
- `release_date`: fecha de lanzamiento
- `views`: número de vistas
- `id_artist`: clave foránea que referencia la tabla de artistas
- `lyrics_song`: letra de la canción

### La tabla `artists` contiene:
- `id_artist`: clave primaria (autoincremental)
- `artist_name`: nombre del artista
- `artist_nationality`: nacionalidad del artista
- `img_artist`: imagen del artista
- `description`: breve descripcion del artista

### La tabla `users` contiene:
- `id`: clave primaria (autoincremental)
- `email`: nombre de usuario
- `password`: contraseña almacenada de forma segura (hash)

![image](https://github.com/user-attachments/assets/4710ef99-5197-4b8a-8cf3-b42a0c03d616)

y esta es una de las paginas del top:

![image](https://github.com/user-attachments/assets/81855a82-22ff-476c-bede-eff906878b3c)

## Instalación

### Requisitos:
- Apache
- MySQL o MariaDB

### Pasos:
1. **Clonar el repositorio** en una carpeta dentro de `/xampp/htdocs/`, por ejemplo: `/xampp/htdocs/WEB2-TPE`.
   
2. **Configurar la base de datos**: crear una base de datos llamada `top_songs`. Puedes importar el script que se encuentra en la carpeta con el nombre de `top_songs.sql`, que genera las tablas y relaciones necesarias.

3. Despliegue automático de tablas: si no has importado el script SQL previamente, al ejecutar por primera vez el proyecto, se crearán las tablas con datos iniciales de ejemplo.

## Usuarios:
- Usuario administrador:
  - username: webadmin
  - password: admin
 
## Caracteristicas tecnicas:
 
- El sitio está desarrollado utilizando el patrón MVC.
- Las vistas están implementadas mediante plantillas PHTML.
- Las rutas del sitio son semánticas y fáciles de navegar.
- El código incluye protección contra inyecciones SQL mediante prepared statements de PDO.



