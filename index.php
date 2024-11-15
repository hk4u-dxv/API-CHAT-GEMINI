<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini Assistant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-light"></body>
<div class="container py-5">
    <div class="chat-window">
        <div class="chat-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="avatar-container me-3">
                        <img src="assets/images/gemini-logo.svg" class="bot-avatar gemini-logo" alt="Gemini Logo">
                        <span class="status-dot pulse"></span>
                    </div>
                    <div>
                        <h3 class="mb-0">Gemini Assistant</h3>
                        <small class="text-muted status-text">En línea</small>
                    </div>
                </div>
                <div class="chat-actions">
                    <button class="btn btn-icon me-2" id="clear-chat" title="Limpiar chat">
                        <i class="fas fa-broom"></i>
                    </button>
                    <button class="btn btn-icon" id="toggle-theme" title="Cambiar tema">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="chat-toolbar">
            <div class="d-flex justify-content-between p-2">
                <div class="chat-filters">
                    <span class="badge bg-primary me-2">Todos</span>
                    <span class="badge bg-secondary me-2">Preguntas</span>
                    <span class="badge bg-secondary">Respuestas</span>
                </div>
                <div class="chat-info">
                    <small><i class="fas fa-clock"></i> Tiempo de respuesta: ~2s</small>
                </div>
            </div>
        </div>

        <div id="chat-messages" class="chat-messages">
            <div class="message bot-message">
                ¡Hola! ¿En qué puedo ayudarte hoy?
            </div>
        </div>

        <div class="message-tools mb-2 px-3">
            <small class="text-muted">
                <i class="fas fa-info-circle"></i>
                Sugerencias:
                <span class="suggestion-pill">¿Cómo funciona?</span>
                <span class="suggestion-pill">Ayuda</span>
                <span class="suggestion-pill">Comandos</span>
            </small>
        </div>

        <div class="chat-input">
            <button class="btn btn-icon" id="attach-file" title="Adjuntar archivo">
                <i class="fas fa-paperclip"></i>
            </button>
            <div class="input-wrapper">
                <input type="text" id="chat-input" class="form-control" placeholder="Escribe tu mensaje...">
                <div class="input-actions">
                    <button class="btn btn-icon" id="emoji-picker" title="Emojis">
                        <i class="far fa-smile"></i>
                    </button>
                    <button class="btn btn-icon" id="voice-input" title="Entrada por voz">
                        <i class="fas fa-microphone"></i>
                    </button>
                </div>
            </div>
            <button id="send-button" class="btn btn-primary btn-send" title="Enviar">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js" type="module"></script>
</body>

</html>