export class ChatManager {
  constructor() {
    this.initializeEventListeners();
    this.initializeExtraFeatures();
  }

  initializeEventListeners() {
    const input = document.getElementById("chat-input");
    const button = document.getElementById("send-button");

    input?.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        this.enviarMensaje();
      }
    });

    button?.addEventListener("click", () => {
      this.enviarMensaje();
    });
  }

  initializeExtraFeatures() {
    // Botón de limpiar chat
    document.getElementById("clear-chat")?.addEventListener("click", () => {
      if (confirm("¿Estás seguro de que quieres limpiar el chat?")) {
        document.getElementById("chat-messages").innerHTML = "";
        this.agregarMensaje("¡Hola! ¿En qué puedo ayudarte hoy?", "bot");
      }
    });

    // Botón de cambiar tema
    document.getElementById("toggle-theme")?.addEventListener("click", () => {
      document.body.classList.toggle("dark-theme");
      const icon = document.querySelector("#toggle-theme i");
      icon.classList.toggle("fa-moon");
      icon.classList.toggle("fa-sun");
    });

    // Sugerencias clickeables
    document.querySelectorAll(".suggestion-pill").forEach(pill => {
      pill.addEventListener("click", () => {
        const input = document.getElementById("chat-input");
        input.value = pill.textContent;
        input.focus();
      });
    });

    // Botón de adjuntar archivo
    document.getElementById("attach-file")?.addEventListener("click", () => {
      alert("Función de adjuntar archivo en desarrollo");
    });

    // Botón de entrada por voz
    document.getElementById("voice-input")?.addEventListener("click", () => {
      alert("Función de entrada por voz en desarrollo");
    });
  }

  async enviarMensaje() {
    const input = document.getElementById("chat-input");
    const button = document.getElementById("send-button");
    const mensaje = input.value.trim();

    if (!mensaje) return;

    // Deshabilitar input y botón mientras se procesa
    input.disabled = true;
    button.disabled = true;

    this.agregarMensaje(mensaje, "user");
    input.value = "";

    const loadingMessage = this.agregarMensaje(
        '<i class="fas fa-spinner fa-spin"></i> Escribiendo...', 
        "bot"
    );

    try {
      const response = await fetch("obtenerDatosChat.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ mensaje }),
      });

      const data = await response.json();
      loadingMessage.remove();

      if (!data.error) {
        this.agregarMensaje(data.mensaje, "bot");
      } else {
        this.agregarMensaje("Error: " + data.mensaje, "bot");
      }
    } catch (error) {
      loadingMessage.remove();
      this.agregarMensaje("Error en la comunicación con el servidor", "bot");
    } finally {
      // Rehabilitar input y botón
      input.disabled = false;
      button.disabled = false;
      input.focus();
    }
  }

  agregarMensaje(texto, tipo) {
    const chatMessages = document.getElementById("chat-messages");
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("message", `${tipo}-message`);
    messageDiv.innerHTML = texto;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return messageDiv;
  }
}
