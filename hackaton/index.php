<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGIQ - Sistema de Gestión de Instrumental Quirúrgico</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #005b96;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #012d4a;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        nav li {
            display: inline;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #005b96;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .card h3 {
            color: #005b96;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .btn {
            background-color: #005b96;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #004578;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            background-color: #ff4444;
            color: white;
            border-radius: 5px;
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <header>
        <h1>SGIQ - Sistema de Gestión de Instrumental Quirúrgico</h1>
    </header>
    <!-- <nav>
        <ul>
            <li><a href="#inventario">Inventario</a></li>
            <li><a href="#procedimientos">Procedimientos</a></li>
            <li><a href="#instrumentadores">Instrumentadores</a></li>
            <li><a href="#reportes">Reportes</a></li>
            <li><a href="#configuracion">Configuración</a></li>
        </ul>
    </nav> -->

    <div class="container">
        <div class="dashboard">
            <div class="card">
                <h3>Registro de Instrumental</h3>
                <p>Registro detallado de equipos e instrumentos quirúrgicos.</p>
                <button class="btn" onclick="mostrarFormulario('registro-instrumental')">Nuevo Registro</button>
            </div>
            <div class="card">
                <h3>Gestión de Procedimientos</h3>
                <p>Control de inventario antes y después de cada cirugía.</p>
                <button class="btn" onclick="mostrarFormulario('gestion-procedimiento')">Nuevo Procedimiento</button>
            </div>
            <div class="card">
                <h3>Instrumentadores</h3>
                <p>Registro y asignación de personal quirúrgico.</p>
                <button class="btn" onclick="mostrarFormulario('registro-instrumentador')">Registrar Instrumentador</button>
            </div>
        </div>

        <!-- Sección de Registro de Instrumental -->
        <?php
        include "instrumento.php";
        ?>
        <div id="registro-instrumental" class="form-section" style="display: none;">
            <h2>Registro de Instrumental Quirúrgico</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" name="codigo" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" required>
                        <option value="">Seleccione...</option>
                        <option value="pinza">Pinza</option>
                        <option value="tijera">Tijera</option>
                        <option value="bisturi">Bisturí</option>
                        <option value="retractor">Retractor</option>
                        <option value="portaagujas">Portaagujas</option>
                        <option value="accesorio">Accesorio</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" required>
                        <option value="disponible">Disponible</option>
                        <option value="mantenimiento">En mantenimiento</option>
                        <option value="desechado">Desechado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha-ingreso">Fecha de Ingreso:</label>
                    <input type="date" name="fecha-ingreso" required>
                </div>
                <div class="form-group">
                    <label for="esterilizado">Estado de esterilización:</label>
                    <select name="esterilizado" required>
                        <option value="si">Esterilizado</option>
                        <option value="no">No esterilizado</option>
                        <option value="pendiente">Pendiente de esterilización</option>
                    </select>
                </div>
                <button type="submit" class="btn" name="btninstrumento" value="ok">Guardar Instrumento</button>
            </form>
        </div>

        <!-- Sección de Gestión de Procedimientos -->
        <?php
        include "procedimiento.php";
        ?>
        <div id="gestion-procedimiento" class="form-section" style="display: none;">
            <h2>Gestión de Procedimiento Quirúrgico</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="codigo-procedimiento">Código de Procedimiento:</label>
                    <input type="text" name="codigo" required>
                </div>
                <div class="form-group">
                    <label for="tipo-procedimiento">Tipo de Procedimiento:</label>
                    <input type="text" name="tipo" required>
                </div>
                <div class="form-group">
                    <label for="instrumentador">ID del Instrumentador Responsable:</label>
                    <input type="text" name="instrumentador" required>
                </div>
                <div class="form-group">
                    <label>Inventario Pre-Quirúrgico:</label>
                    <input type="text" name="pre" placeholder="Ingrese cantidad de instrumentos pre-quirúrgicos" required>
                </div>
                <div class="form-group">
                    <label>Inventario Post-Quirúrgico:</label>
                    <input type="text" name="post" placeholder="Ingrese cantidad de instrumentos post-quirúrgicos" required>
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" rows="4" style="width: 100%;"></textarea>
                </div>
                <button type="submit" class="btn" name="btnprocedimiento" value="ok">Finalizar Procedimiento</button>
            </form>
        </div>

        <!-- Hacer una seccion para registrar un instrumentador -->
        <?php
        include "registro.php";
        ?>
        <div id="registro-instrumentador" class="form-section" style="display: none;">
            <h2>Registro de Instrumentador Quirúrgico</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="id-instrumentador">ID Instrumentador:</label>
                    <input type="text" name="id" required>
                </div>
                <div class="form-group">
                    <label for="nombre-instrumentador">Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="especialidad">Especialidad:</label>
                    <input type="text" name="especialidad" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="correo" required>
                </div>
                <button type="submit" class="btn" name="btnregistrar" value="ok">Registrar Instrumentador</button>
            </form>
        </div>
        <!-- Sección de Reportes -->
        <div id="reportes-section">
            <h2>Reportes Recientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Procedimiento</th>
                        <th>Fecha</th>
                        <th>Instrumentador</th>
                        <th>Instrumentos Usados</th>
                        <th>Incidentes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conn->query("SELECT * FROM reportes");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_proc ?></td>
                            <td><?= $datos->fecha ?></td>
                            <td><?= $datos->id_iq ?></td>
                            <td><?= $datos->id_ins ?></td>
                            <td><?= $datos->incidentes ?></td>
                            <td><?= $datos->acciones ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Notificación de errores -->
    <div id="error-notification" class="notification">
        ¡Error! Hay instrumentos faltantes en el conteo.
    </div>

    <script>
        function mostrarFormulario(formId) {
            // Oculta todos los formularios primero
            document.querySelectorAll('.form-section').forEach(el => {
                el.style.display = 'none';
            });
            // Muestra el formulario seleccionado
            document.getElementById(formId).style.display = 'block';
        }

        function realizarConteo(tipo) {
            // Simulación de conteo de instrumentos
            alert("Realizando conteo ${tipo === 'pre' ? 'inicial' : 'final'}...");

            // Simulación de error (para demostrar notificación)
            if (tipo === 'post') {
                mostrarError("Faltan 2 instrumentos en el conteo final");
            }
        }

        function mostrarError(mensaje) {
            const notificacion = document.getElementById('error-notification');
            notificacion.textContent = mensaje;
            notificacion.style.display = 'block';

            setTimeout(() => {
                notificacion.style.display = 'none';
            }, 5000);
        }

        // Simulación de datos
        document.addEventListener('DOMContentLoaded', function() {
            // Aquí iría la lógica para cargar datos reales desde una API
        });
    </script>
</body>

</html>