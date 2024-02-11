# Challenge Diego Canteros

Este proyecto se ha creado como parte del desafío para Diego Canteros. Se han desarrollado endpoints y entidades en la base de datos para facilitar la gestión del alta de clientes, suscripciones y cobros.

## Endpoints Disponibles

1. **Guardar el plan de suscripción de un cliente**
   - **Endpoint:** `http://localhost:8080/index.php/cliente/agregar`
   - **Método:** `POST`
   - **Payload de Ejemplo:**
     ```json
     {
       "name": "Monte Grande",
       "email": "diego@example.com",
       "plan": 1,
       "cobro": 1
     }
     ```
   - **Respuesta de Ejemplo:**
     ```json
     {
       "status": 200,
       "msj": "Te has suscriptio exitosamente"
     }
     ```

2. **Consultar el detalle del lote.**
   - **Endpoint:** `http://localhost:8080/index.php/getcobros`
   - **Método:** `GET`
   - **Respuesta de Ejemplo:**
     ```json
    {
      "status":200,
      "data":"[{\"email\":\"test@test.com\",\"forma_de_pago\":\"debito por cbu\",\"precio\":\"10000\"}]"
      }
     ```

3. **Consultar el monto total y cantidad de cobros por lote**
   - **Endpoint:** `http://localhost:8080/index.php/getcobros/total`
   - **Método:** `GET`
   - **Respuesta de Ejemplo:**
     ```json
     {
      "status":200,
      "data":"[{\"total_costo\":\"10000\",\"cantidad_registros\":\"1\"}]"
      }
     ```

4. **Consultar los datos de las suscripciones activas.**
   - **Endpoint:** `http://localhost:8080/index.php/getsuscripcionesactivas`
   - **Método:** `GET`
   - **Respuesta de Ejemplo:**
     ```json
     {
      "status":200,
      "data":"[{\"total_costo\":\"10000\",\"cantidad_registros\":\"1\"}]"
      }
     ```

5. **Ejecucion de migraciones para la creacion de las tablas de base de datos.**
   - **Endpoint:** `http://localhost:8080/index.php/migrations`
   - **Método:** `GET`

6. **Poder generar un lote de cobro**
   - **Endpoint:** `http://localhost:8080/index.php/cron/cobros`
   - **Método:** `GET`
