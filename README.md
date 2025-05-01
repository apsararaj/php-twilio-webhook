# Twilio Voice Call Stream to WebSocket (PHP Webhook)

This project sets up a PHP webhook that listens for incoming calls on a Twilio phone number and instructs Twilio to stream the audio to a specified WebSocket server using TwiML `<Connect><Stream>`.

---

## ✅ Features

- Receive incoming Twilio calls
- Stream live audio to a WebSocket URL
- Optional Twilio signature verification
- `.env` support for secure configuration

---

## 🔧 Requirements

- PHP 7.4+
- Composer
- Internet-accessible endpoint (via [ngrok](https://ngrok.com/) or a public web server)
- Twilio phone number (must be voice-capable)

---

## 📦 Installation

1. **Clone the repo** or create your project directory:

   ```bash
   mkdir twilio-voice-websocket
   cd twilio-voice-websocket

2. **Install dependencies using Composer:** :

   ```bash
   composer install
2. **Create a .env file in the project root and add your Twilio Auth Token** :

   ```bash
   TWILIO_AUTH_TOKEN=your_twilio_auth_token_here
