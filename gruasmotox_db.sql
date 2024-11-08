rolovedo03
rolovedo03
En línea

Chocorramito ha iniciado una llamada que ha durado una hora. — 27/09/2024 16:20
rolovedo03 — 27/09/2024 16:20
Voy jajaja
Jajaja mentiras pa ya no
Ya se cómo hacer esa mierda pero Melo le voy a conpartir
rolovedo03 ha iniciado una llamada que ha durado 2 horas. — 24/10/2024 20:43
Chocorramito — 24/10/2024 20:45
import random

palabras = {
    'animales': ['perro', 'gato', 'elefante', 'jirafa', 'cocodrilo'],
    'frutas': ['manzana', 'pera', 'uva', 'sandia', 'melon'],
    'colores': ['rojo', 'verde', 'azul', 'amarillo', 'negro'],
    'paises': ['colombia', 'mexico', 'argentina', 'venezuela']
}

print("Bienvenido al juego del ahorcado: ")
categorias = list(palabras.keys())
print(f"Selecciona una de estas la categorias: {categorias} ")
categoria = input("Categoria: ")

while categoria not in categorias:
    print("La categoria ingresada es incorecta, intentalo de nuevo: ")
    categoria = input("Categoria: ")

intentos = 0
palabra_secreta = random.choice(palabras[categoria])
cadena = "-" * len(palabra_secreta)

while True:
    print(cadena)
    letra = input("ingresa la letra: ")
    if letra in palabra_secreta:
        for i in range(len(palabra_secreta)):
            if letra == palabra_secreta[i]:
                cadena = cadena[:i] + letra + cadena[i+1:]
    else:
        intentos += 1
        if intentos == 1:
            print(" 0")
        elif intentos == 2:
            print(" 0")
            print(" |")
        elif intentos == 3:
            print(" 0")
            print("/|")
        elif intentos == 4:
            print(" 0")
            print("/|\")
        elif intentos == 5:
            print(" 0")
            print("/|\")
            print("/")
        elif intentos == 6:
            print(" 0")
            print("/|\")
            print("/\")
            print(f"Has perdido, la palabra secreta era: {palabra_secreta}")
            break
    if palabra_secreta == cadena:
        print(f"Has ganado, la palabra secreta era: {palabra_secreta}")
        break
rolovedo03 — 24/10/2024 21:04
if len(letra) != 1 or not letra.isalpha():
        print("Por favor ingresa solo una letra.")
        continue
Chocorramito — 24/10/2024 21:08
Validación de que sea una sola letra alfabética
    if len(letra) != 1 or not ('a' <= letra <= 'z'):
        print("Por favor, ingresa solo una letra válida.")
        continue
Chocorramito — 24/10/2024 21:28
if len(letra) != 1:
        print("Por favor, ingresa solo una letra válida.")
        continue
Chocorramito — 24/10/2024 21:47
import random
import tkinter as tk
from tkinter import messagebox

# NO LEA ESTO TODAVIA PROFE
def pregunta_profe():
Expandir
message.txt
4 KB
Chocorramito — 24/10/2024 22:15
import random
import tkinter as tk
from tkinter import messagebox

# NO LEA ESTO TODAVIA PROFE
def pregunta_profe():
Expandir
message.txt
4 KB
Chocorramito — 24/10/2024 22:33
https://app.copyleaks.com/es/dashboard/v1/account/scans/9nl76nz0bbu0kvmj/report?viewMode=one-to-many&contentMode=html&sourcePage=1&suspectPage=1
Copyleaks
Copyleaks: AI & Machine Learning Powered Plagiarism Checker
Copyleaks plagiarism checker is the best free online plagiarism checker tool. Contact us for any inquiries about our plagiarism detection services.
rolovedo03 ha iniciado una llamada que ha durado una hora. — 28/10/2024 11:12
Chocorramito — 28/10/2024 11:17
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 05:15 PM
Expandir
peluqueriabd.sql
17 KB
Chocorramito — 28/10/2024 12:08
<?php
include("api/db_connection.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
Expandir
message.txt
7 KB
Chocorramito — 28/10/2024 12:15
<?php
    // Conexión a la base de datos
    include("api/db_connection.php");

    // Consulta para obtener solo los usuarios con rol de cliente
    $sql = "
        SELECT u.id, u.nombre, u.apellido, ur.rol_id 
        FROM Usuario u
        JOIN UsuarioRol ur ON ur.usuario_id = u.id
        WHERE ur.rol_id = 3"; 
    $result = $db_connection->query($sql);

    // Iterar sobre los resultados y llenar el select con los clientes
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . ucfirst($row['nombre']) . " " . ucfirst($row['apellido']) . "</option>";
        }
    } else {
        echo "<option>No hay estilistas disponibles</option>";
    }

?>
Chocorramito — 29/10/2024 12:32
rolovedo
locota
rolovedo03 ha iniciado una llamada que ha durado unos segundos. — 29/10/2024 12:35
rolovedo03 — 29/10/2024 12:35
Pirobo
No me colgues
Chocorramito — 29/10/2024 12:35
usted es
autista
?
pregunta seria
Chocorramito — 01/11/2024 15:43
locota
rolovedo03 — 01/11/2024 15:57
Ola
Chocorramito ha iniciado una llamada que ha durado 3 horas. — 01/11/2024 15:58
Chocorramito — 01/11/2024 16:14
En SQL, JOIN (que en español se pronuncia como "jin" o "lloin") es una cláusula usada para combinar filas de dos o más tablas basándose en una condición relacionada entre ellas. Existen varios tipos de JOIN, y cada uno define de forma específica cómo se unen las filas de las tablas. A continuación te explico los tipos más comunes de JOIN en SQL:

INNER JOIN: Devuelve las filas que tienen coincidencias en ambas tablas. Es el tipo de JOIN más común.

sql
Copy code
SELECT tabla1.columna, tabla2.columna
FROM tabla1
INNER JOIN tabla2 ON tabla1.id = tabla2.id;
LEFT JOIN (o LEFT OUTER JOIN): Devuelve todas las filas de la tabla de la izquierda y las filas coincidentes de la tabla de la derecha. Si no hay coincidencia, se rellena con NULL.

sql
Copy code
SELECT tabla1.columna, tabla2.columna
FROM tabla1
LEFT JOIN tabla2 ON tabla1.id = tabla2.id;
RIGHT JOIN (o RIGHT OUTER JOIN): Devuelve todas las filas de la tabla de la derecha y las filas coincidentes de la tabla de la izquierda. Si no hay coincidencia, se rellena con NULL.

sql
Copy code
SELECT tabla1.columna, tabla2.columna
FROM tabla1
RIGHT JOIN tabla2 ON tabla1.id = tabla2.id;
FULL JOIN (o FULL OUTER JOIN): Devuelve todas las filas cuando hay coincidencia en una u otra tabla. Si no hay coincidencia, se rellena con NULL.

sql
Copy code
SELECT tabla1.columna, tabla2.columna
FROM tabla1
FULL JOIN tabla2 ON tabla1.id = tabla2.id;
CROSS JOIN: Devuelve el producto cartesiano de las dos tablas. Esto significa que cada fila de la primera tabla se combina con cada fila de la segunda tabla.

sql
Copy code
SELECT tabla1.columna, tabla2.columna
FROM tabla1
CROSS JOIN tabla2;
Cada tipo de JOIN es útil en diferentes escenarios, dependiendo de cómo quieras combinar o comparar los datos entre tablas en tus consultas SQL.
Chocorramito — 01/11/2024 16:34
El método $result->fetch_assoc()
Descripción: fetch_assoc() es un método que toma cada fila devuelta por la consulta SQL y la convierte en un arreglo asociativo.
Por qué es importante: Un arreglo asociativo nos permite acceder a cada dato de la fila de una forma intuitiva usando el nombre de la columna como clave, en lugar de tener que recordar la posición de cada dato.
Chocorramito — 01/11/2024 16:51
<div class="form-group">
                        <label for="rol">Rol:</label>
                        <select name="rol" required>
                            <?php
                            include 'api/rol/read.php';
                            $rolesJson = obtenerRoles($db_connection);
                            $roles = json_decode($rolesJson, true);

                            if (!empty($roles)) {
                                foreach($roles as $rol) {
                                    echo "<option value='" . $rol['id'] . "'>" . $rol['nombre'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No hay roles disponibles</option>";
                            }
                            ?>
                        </select>
                    </div>
rolovedo03 ha iniciado una llamada que ha durado una hora. — 05/11/2024 11:13
Chocorramito — 05/11/2024 11:16
RF-007: Rastreo en tiempo real
Descripción: El sistema debe permitir a los usuarios rastrear en tiempo real la ubicación de la grúa asignada una vez que se haya confirmado la solicitud.
Complejidad: Este requisito es complejo porque implica actualizaciones constantes de la ubicación de la grúa. El sistema debe recibir datos de GPS, mostrarlos en el mapa para el cliente y el administrador, y gestionar la interfaz de comunicación en tiempo real.
Actores involucrados: Cliente, sistema, conductor, administrador.
Chocorramito — 05/11/2024 11:24
RF-008: Métodos de pago
Descripción: El sistema debe permitir a los usuarios pagar por el servicio utilizando diferentes métodos de pago como tarjeta de crédito, PayPal, transferencia bancaria o efectivo.
Complejidad: Este requisito es complejo por la integración con múltiples plataformas de pago, cada una con diferentes métodos de autenticación y validación. También implica la confirmación de pagos y la actualización de los estados de solicitud de servicio según el resultado del pago.
Actores involucrados: Cliente, sistema, plataforma de pago.
Chocorramito — 05/11/2024 11:31
RF-025: Actualización del estado del servicio
Descripción: El sistema debe permitir a los conductores actualizar el estado del servicio en tiempo real, indicando si están en camino, han llegado al punto de origen, están en proceso de traslado o han completado el servicio.
Complejidad: Este requisito es complejo porque requiere que el sistema actualice el estado del servicio en tiempo real y notifique a los usuarios y administradores sobre el estado actual. Incluye varias interacciones: el conductor actualiza el estado, el sistema procesa y almacena esta información, y luego envía notificaciones al cliente y al administrador.
Actores involucrados: Conductor, sistema, cliente, administrador.
rolovedo03 — 05/11/2024 11:45
https://drive.google.com/file/d/1RQqDm-WUAfph9P_0thBJvgVqx867Of72/view?usp=sharing
Google Docs
BPMN_EDS_13/08/2024.drawio
Chocorramito — 05/11/2024 11:56
Imagen
Imagen
Imagen
Chocorramito — 05/11/2024 12:13
https://lucid.app/lucidchart/cf10c513-8850-4b11-92b0-4ea893c6d44c/edit?viewport_loc=-1658%2C-1782%2C3758%2C1664%2CorS9jotNWJaXx&invitationId=inv_859441b0-df95-4fb9-b2e2-86d3e28d4c7d
Chocorramito — 05/11/2024 14:16
Oe
Gei
rolovedo03 — 05/11/2024 14:16
Ola
rolovedo03 ha iniciado una llamada que ha durado una hora. — 05/11/2024 14:17
rolovedo03 — 05/11/2024 14:43
https://www.wallpaperflare.com/search?wallpaper=motorcycle+Racing
Motorcycle Racing 1080P, 2K, 4K, 5K HD wallpapers free download | W...
motorcycle Racing 1080P, 2K, 4K, 5K HD wallpapers free download, these wallpapers are free download for PC, laptop, iphone, android phone and ipad desktop
Chocorramito — 05/11/2024 14:53
Imagen
Chocorramito — 05/11/2024 15:03
Imagen
Chocorramito ha iniciado una llamada. — hoy a las 10:26
Chocorramito — hoy a las 12:31
git clone -b dev01
git checkout -b dev01 origin/dev01
git fetch --all
Chocorramito — hoy a las 13:23
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 07:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gruasmotox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `motivo`
--

CREATE TABLE `motivo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moto`
--

CREATE TABLE `moto` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cilindraje` int(11) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `soat` tinyint(1) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `estado_pago` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Cliente'),
(2, 'Administrador'),
(3, 'Conductor');

-- --------------------------------------------------------

--
-- Table structure for table `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `moto_id` int(11) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL,
  `ubicacion_actual` varchar(255) DEFAULT NULL,
  `destino` varchar(255) DEFAULT NULL,
  `motivo_id` int(11) DEFAULT NULL,
  `costo_estimado` decimal(10,2) DEFAULT NULL,
... (180 líneas restantes)
Contraer
gruasmotox_db.sql
7 KB
﻿
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 07:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gruasmotox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `motivo`
--

CREATE TABLE `motivo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moto`
--

CREATE TABLE `moto` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cilindraje` int(11) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `soat` tinyint(1) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `estado_pago` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Cliente'),
(2, 'Administrador'),
(3, 'Conductor');

-- --------------------------------------------------------

--
-- Table structure for table `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `moto_id` int(11) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL,
  `ubicacion_actual` varchar(255) DEFAULT NULL,
  `destino` varchar(255) DEFAULT NULL,
  `motivo_id` int(11) DEFAULT NULL,
  `costo_estimado` decimal(10,2) DEFAULT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `tipodocumento` varchar(100) NOT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `tipodocumento`, `documento`, `rol_id`) VALUES
(1, 'Daniel', 'Lopez', 'danilq139@gmail.com', '11111111', 'CEDULA', '1089098501', 1),
(3, 'Julian', 'Vasquez', 'minai@gg.com', '0000', 'CEDULA', '1088240743', 1),
(4, 'Mariana', 'Marquez', 'mar@gmail.com', '0000', 'CEDULA', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicio_id` (`servicio_id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `moto_id` (`moto_id`),
  ADD KEY `tipo_servicio_id` (`tipo_servicio_id`),
  ADD KEY `motivo_id` (`motivo_id`);

--
-- Indexes for table `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `cedula` (`documento`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motivo`
--
ALTER TABLE `motivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moto`
--
ALTER TABLE `moto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `moto_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`id`);

--
-- Constraints for table `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`moto_id`) REFERENCES `moto` (`id`),
  ADD CONSTRAINT `servicio_ibfk_3` FOREIGN KEY (`tipo_servicio_id`) REFERENCES `tipo_servicio` (`id`),
  ADD CONSTRAINT `servicio_ibfk_4` FOREIGN KEY (`motivo_id`) REFERENCES `motivo` (`id`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
gruasmotox_db.sql
7 KB