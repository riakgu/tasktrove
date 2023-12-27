<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isNull;

class ChatbotController extends Controller
{
    /**
     * Menampilkan halaman utama chatbot.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $data = [
            "title" => "Chatbot",
        ];

        // Mengembalikan view chatbot dengan judul halaman
        return view('chatbot.index', $data);
    }

    /**
     * Mengirim pesan ke API OpenAI dan mendapatkan balasan.
     *
     * @param Request $request Data request dari pengguna.
     * @return \Illuminate\Http\JsonResponse
     */
    public function openai(Request $request) {
        $message = $request->input('message');

        try {
            // Membuat request ke API OpenAI
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

            // Mengembalikan respon chat dari API
            return response()->json($data['choices'][0]['message']['content']);
        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi kegagalan request
            return response()->json('Terjadi kesalahan saat memproses permintaan Anda');
        }
    }

    /**
     * Mengirim pesan ke API Perplexity dan mendapatkan balasan.
     *
     * @param Request $request Data request dari pengguna.
     * @return \Illuminate\Http\JsonResponse
     */
    public function pplx(Request $request) {
        $message = $request->input('message');

        try {
            // Membuat request ke API Perplexity
            $data = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('PPLX_API_KEY'),
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

            // Mengembalikan respon chat dari API
            return response()->json($data['choices'][0]['message']['content']);
        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi kegagalan request
            return response()->json('Terjadi kesalahan saat memproses permintaan Anda');
        }
    }
}

