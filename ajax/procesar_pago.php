<?php
// Procesar la respuesta de Mercado Pago
$data = file_get_contents("php://input");
$event = json_decode($data);

// Realizar acciones según el evento recibido (pago aprobado, rechazado, etc.)
// Aquí puedes actualizar tu base de datos, enviar confirmaciones por correo, etc.

http_response_code(200);
?>