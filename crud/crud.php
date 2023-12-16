<?php
// Incluir archivo de conexión
include "/db/conexion.php";
include "/registro.html";
// Crear registro
function crearRegistro($conexion, $nombre, $apellidos, $dni, $fecha, $email) {
    $stmt = $conexion->prepare("INSERT INTO clientes (nombre, apellidos, dni, fecha_nacimiento, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellidos, $dni, $fecha, $email);
    $stmt->execute();
    $stmt->close();
}

// Leer registros
function obtenerRegistros($conexion) {
    $sql = "SELECT * FROM clientes";
    $result = $conexion->query($sql);
    return $result;
}

// Actualizar registro
function actualizarRegistro($conexion, $id, $nombre, $apellidos, $dni, $fecha, $email) {
    $stmt = $conexion->prepare("UPDATE clientes SET nombre = ?, apellidos = ?, dni = ?, fecha_nacimiento = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $nombre, $apellidos, $dni, $fecha, $email, $id);
    $stmt->execute();
    $stmt->close();
}

// Eliminar registro
function eliminarRegistro($conexion, $id) {
    $stmt = $conexion->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>