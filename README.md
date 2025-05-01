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

1. **Install dependencies using Composer:** :

   ```bash
   composer install
2. **Create a .env file in the project root and add your Twilio Auth Token** :

   ```bash
   TWILIO_AUTH_TOKEN=your_twilio_auth_token_here


---

## 🚀 Running Locally

Start the PHP server:

```bash
php -S 0.0.0.0:8000
```

Your webhook will now be available at:
```
http://localhost:8000/webhook.php
```

---

## 🌐 Expose to Public Internet via ngrok

1. [Download ngrok](https://ngrok.com/download) if you don't have it.

2. In a new terminal, run:

```bash
ngrok http 8000
```

3. Copy the HTTPS forwarding URL from ngrok (e.g., `https://abcd1234.ngrok.io`)

---

## 🔗 Connect Webhook to Twilio Number

1. Go to the [Twilio Console](https://console.twilio.com/).

2. Navigate to **Phone Numbers > Manage > Active Numbers**.

3. Click your Twilio number (e.g., `+1 (934) 253-0570`).

4. Under **Voice & Fax > A CALL COMES IN**:
   - Choose **Webhook**
   - Method: `HTTP POST`
   - URL: `https://your-ngrok-url.ngrok.io/webhook.php` (from previous step)

5. Click **Save**.
6. Call to the Twilio Number and check terminal for messages

---
