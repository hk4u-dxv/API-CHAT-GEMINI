<?php
// Carga las variables de entorno
require_once __DIR__ . '/../includes/Environment.php';
Environment::load();

// Configuración de la API
define('API_KEY', Environment::get('GEMINI_API_KEY'));
define('API_TIMEOUT', Environment::get('API_TIMEOUT'));

// Configuración de la aplicación
define('APP_DEBUG', Environment::get('APP_DEBUG', false));

// Configuración de cabeceras
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', Environment::get('APP_DEBUG', false));
