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
# primero entramos a registrar un usuario y se guarda correctamente con el "200 ok"

<img width="1281" height="695" alt="image" src="https://github.com/user-attachments/assets/068f7ccc-9988-48fb-8fa6-e57ed30b393c" />

 despues iniciamos con el login para autentificar que el usuario si puede entrar
<img width="1260" height="683" alt="image" src="https://github.com/user-attachments/assets/e691fcdc-f977-4122-b9ff-b316fda46e89" />

copio el token y lo pego en el auth para poder estar conectado con el login o ese usuario 
<img width="1239" height="678" alt="image" src="https://github.com/user-attachments/assets/fe6b8281-da8e-4ecf-862d-9433d31c29c1" />

 se hace lo mismo con usuario se autentifica el token y guardamos como se puede ver se nos muestra la lista que hemos creado
<img width="1274" height="695" alt="image" src="https://github.com/user-attachments/assets/45deb13f-e422-49c8-a658-329a1269b3ce" />

 si deseamos actualizar conectamos el token nuevamnete y luego hacemos los cambios y guardamos 
<img width="1272" height="663" alt="image" src="https://github.com/user-attachments/assets/178dd360-7837-4f2a-8db0-d32b321a38e8" />

 finalmente cerramos sesion con el usuario autentificado que igual pusimos el token
<img width="1311" height="702" alt="image" src="https://github.com/user-attachments/assets/e8e58ad5-4129-4ba7-93dc-978cc9095d9d" />




# Conclusión

En esta actividad se logró desarrollar una API REST funcional utilizando Laravel, MySQL y Laravel Sanctum.

El sistema permite registrar usuarios, iniciar sesión y administrar pedidos mediante las operaciones de crear, consultar, actualizar y eliminar. También se implementaron validaciones para evitar datos incorrectos y tokens para proteger las rutas privadas.

Las pruebas realizadas con Bruno permitieron comprobar que las funciones trabajan correctamente tanto de manera local como en el VPS.
