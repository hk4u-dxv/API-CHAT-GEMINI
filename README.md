# 🤖 API-CHAT-GEMINI

Sistema de chat interactivo utilizando la API de Google Gemini. Permite mantener conversaciones con IA y gestionar el historial de chats.

## 📋 Características

- Chat en tiempo real con IA
- Historial de conversaciones
- Interfaz responsive y amigable
- Manejo de errores y estados de carga
- Soporte para diferentes tipos de mensajes
- Almacenamiento de historial de chat

## 🚀 Instalación

1. Clona el repositorio

```bash
git clone https://github.com/tu-usuario/API-CHAT-GEMINI.git
cd API-CHAT-GEMINI
```

2. Configura las variables de entorno

```bash
cp .env
```

```env
# API KEY
GEMINI_API_KEY=tu_api_key_aqui
```

## 🛠️ Estructura del Proyecto

```bash
API-CHAT-GEMINI/
├── assets/
│ ├── css/
│ │ └── styles.css
│ ├── images/
│ │ ├── circuit-board.svg
│ │ └── gemini-logo.svg
│ └── js/
│   ├── modules/
│   │ └── ChatManager.js     # Gestión del chat
│   └── app.js              # Punto de entrada JS
├── config/
│ └── config.php            # Configuración general
├── includes/
│ ├── Environment.php       # Manejo de variables de entorno
│ ├── ErrorHandler.php      # Manejo de errores
│ └── GeminiAPI.php         # Comunicación con API
├── .env                    # Variables de entorno
├── README.md               # Documentación
├── obtenerDatosChat.php    # Endpoint para el chat
└── index.php              # Punto de entrada
```
