<?php
// Verifica que las variables de entorno estén configuradas
if (!file_exists(__DIR__ . '/.env')) {
    die(json_encode([
        'error' => true,
        'mensaje' => 'Error de configuración: Archivo .env no encontrado'
    ]));
}

// Incluye los archivos necesarios
require_once 'config/config.php';
require_once 'includes/ErrorHandler.php';
require_once 'includes/GeminiAPI.php';

// Registra los manejadores de errores
ErrorHandler::register();

// Verifica que la solicitud sea válida
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'error' => true,
        'mensaje' => 'Solicitud inválida'
    ]);
    exit;
}

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['mensaje'])) {
        throw new Exception('Mensaje no proporcionado');
    }

    $gemini = new GeminiAPI(API_KEY);
    $response = $gemini->sendMessage($data['mensaje']);

    echo json_encode([
        'error' => false,
        'mensaje' => $response['candidates'][0]['content']['parts'][0]['text']
    ]);
} catch (Exception $e) {
    echo json_encode([
        'error' => true,
        'mensaje' => $e->getMessage()
    ]);
}
