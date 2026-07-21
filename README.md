# ACTIVIDAD 4  
## API REST CON LARAVEL, SANCTUM Y MYSQL

**Institución:** Instituto Tecnológico de Oaxaca  
**Carrera:** Ingeniería en Sistemas Computacionales  
**Materia:** Programación Web  
**Actividad:** Actividad 4 - Desarrollo de una API REST  
**Alumno:** Uriel Eduardo Guzmán Ramírez    


# Introducción

En esta actividad se desarrolló una API REST desde cero utilizando Laravel. El objetivo principal fue crear un sistema que permitiera registrar usuarios, iniciar sesión y administrar pedidos de una pastelería.
se utiliza Laravel Sanctum para generar tokens de acceso y proteger las funciones que solamente pueden utilizar los usuarios autenticados.

Las pruebas se realizaron con Bruno, donde se comprobaron el registro, el inicio de sesión, la creación de pedidos, la consulta de información, las actualizaciones, las eliminaciones y las validaciones.


# Objetivo

Desarrollar una API REST funcional con Laravel que permita administrar usuarios y pedidos, utilizando autenticación con Laravel Sanctum, validaciones, respuestas JSON y una base de datos MySQL.

---

# Tecnologías utilizadas

- PHP 8.3
- Laravel 13
- MySQL
- Laravel Sanctum
- Bruno
- Nginx
- Laravel Herd

---

# Funciones del proyecto

La API permite realizar las siguientes acciones:

- Registrar nuevos usuarios.
- Iniciar sesión con correo y contraseña.
- Generar tokens de acceso.
- Consultar al usuario autenticado.
- Cerrar sesión.
- Crear pedidos.
- Consultar todos los pedidos.
- Consultar un pedido por su identificador.
- Actualizar pedidos con PUT o PATCH.
- Eliminar pedidos.
- Validar los datos enviados.
- Proteger las rutas mediante un token.

---

# Información de los pedidos

Cada pedido contiene los siguientes datos:

- Cliente.
- Producto.
- Cantidad.
- Total.
- Estado.
- Fecha de creación.
- Fecha de actualización.

Los estados permitidos son:

- `pendiente`
- `preparando`
- `entregado`
- `cancelado`

---

# Rutas de la API

## Rutas públicas

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api` | Muestra información general de la API |
| POST | `/api/register` | Registra un usuario |
| POST | `/api/login` | Inicia sesión y genera un token |

## Rutas protegidas

Las siguientes rutas necesitan un token válido:

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/api/user` | Consulta al usuario autenticado |
| POST | `/api/logout` | Cierra la sesión |
| GET | `/api/pedidos` | Muestra los pedidos |
| POST | `/api/pedidos` | Crea un pedido |
| GET | `/api/pedidos/{id}` | Consulta un pedido |
| PUT | `/api/pedidos/{id}` | Actualiza completamente un pedido |
| PATCH | `/api/pedidos/{id}` | Actualiza parcialmente un pedido |
| DELETE | `/api/pedidos/{id}` | Elimina un pedido |

---

# Autenticación con Laravel Sanctum

Laravel Sanctum se utilizó para generar tokens de acceso.

Cuando un usuario inicia sesión correctamente, la API devuelve una respuesta parecida a la siguiente:

```json
{
  "mensaje": "Inicio de sesión correcto.",
  "token": "TOKEN_GENERADO",
  "tipo_token": "Bearer"
}
```

# Conclusión

En esta actividad se logró desarrollar una API REST funcional utilizando Laravel, MySQL y Laravel Sanctum.

El sistema permite registrar usuarios, iniciar sesión y administrar pedidos mediante las operaciones de crear, consultar, actualizar y eliminar. También se implementaron validaciones para evitar datos incorrectos y tokens para proteger las rutas privadas.

Las pruebas realizadas con Bruno permitieron comprobar que las funciones trabajan correctamente tanto de manera local como en el VPS.
