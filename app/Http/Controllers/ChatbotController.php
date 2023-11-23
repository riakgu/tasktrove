<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isNull;

class ChatbotController extends Controller
{
    public function index() {
        $data = [
            "title" => "Chatbot",
        ];

        return view('chatbot.index', $data);
    }

    public function chatbot(Request $request) {
        $message = $request->input('message');

        try {
            $data = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $message
                    ]
                ],
                'temperature' => 0.5,
                'max_tokens' => 200,
                'top_p' => 1.0,
                'frequency_penalty' => 0.52,
                'presence_penalty' => 0.5,
                'stop' => ['11.']
            ])->json();

            return response()->json($data['choices'][0]['message']['content']);
        } catch (\Exception $e) {
            if ($data['error']['message'] != null) {
                return response()->json($data['error']['message']);
            } else {
                return response()->json('An error occurred while processing your request');
            }
        }
    }

    public function pplx(Request $request) {
        $message = $request->input('message');

        try {
            $data = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('PPLX_API_KEY'), // Change to your Perplexity API key
                'Content-Type' => 'application/json'
            ])->post('https://api.perplexity.ai/chat/completions', [
                'model' => 'codellama-34b-instruct',
                'messages' =>
                    [
                        [
                            'role' => 'system',
                            'content' => 'Be precise and concise.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $message
                        ]
                    ]
            ])->json();

            return response()->json($data['choices'][0]['message']['content']);
        } catch (\Exception $e) {
            if ($data['error']['message'] != null) {
                return response()->json($data['error']['message']);
            } else {
                return response()->json('An error occurred while processing your request');
            }
        }
    }
}
