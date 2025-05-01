<?php
require __DIR__ . '/vendor/autoload.php';

use Twilio\TwiML\VoiceResponse;
use Twilio\Security\RequestValidator;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$twilioAuthToken = $_ENV['TWILIO_AUTH_TOKEN'];
$websocketUrl = 'wss://devapi.ivoz.ai/llm-campaigns/ws/groq/?bot=ivoz';
$streamTrack = 'inbound_track';

// Optional: Validate Twilio request (for production)
$validator = new RequestValidator($twilioAuthToken);
$signature = $_SERVER['HTTP_X_TWILIO_SIGNATURE'] ?? '';
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") .
       "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$params = $_POST;

if (!$validator->validate($signature, $url, $params)) {
    http_response_code(403);
    echo "Invalid Twilio Signature.";
    exit;
}

error_log("Valid webhook request received from Twilio.");

// Create TwiML
$response = new VoiceResponse();
$connect = $response->connect();
$stream = $connect->stream([
    'url' => $websocketUrl,
    'track' => $streamTrack
]);

// Optional: add parameters to pass to WebSocket server
$stream->parameter(['name' => 'CallSid', 'value' => $_POST['CallSid'] ?? '']);
$stream->parameter(['name' => 'From', 'value' => $_POST['From'] ?? '']);

header('Content-Type: application/xml');
echo $response;
?>
