<?php
class GeminiAPI
{
    private $api_key;
    private $base_url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';

    public function __construct($apiKey)
    {
        $this->api_key = $apiKey;
    }

    public function sendMessage($mensaje)
    {
        try {
            $ch = curl_init($this->base_url . '?key=' . $this->api_key);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                ],
                CURLOPT_POSTFIELDS => json_encode([
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $mensaje]
                            ]
                        ]
                    ]
                ])
            ]);

            $response = curl_exec($ch);
            ErrorHandler::handleCurlError($ch);

            return json_decode($response, true);
        } catch (Exception $e) {
            ErrorHandler::log($e);
            throw $e;
        }
    }
} 