<?php
class ErrorHandler {
    public static function register() {
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleException']);
    }

    public static function handleCurlError($ch) {
        $errno = curl_errno($ch);
        if ($errno) {
            throw new Exception(curl_error($ch), $errno);
        }
        
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode >= 400) {
            throw new Exception("HTTP Error: $httpCode");
        }
    }

    public static function log(Exception $e) {
        if (APP_DEBUG) {
            error_log(sprintf(
                "Error: %s\nFile: %s\nLine: %d\nTrace:\n%s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine(),
                $e->getTraceAsString()
            ));
        }
    }

    private static function handleError($level, $message, $file = '', $line = 0) {
        if (error_reporting() & $level) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    private static function handleException($e) {
        self::log($e);
        
        if (APP_DEBUG) {
            echo json_encode([
                'error' => true,
                'mensaje' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        } else {
            echo json_encode([
                'error' => true,
                'mensaje' => 'Ha ocurrido un error en el servidor'
            ]);
        }
    }
} 