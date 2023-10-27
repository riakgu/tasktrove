<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index() {
        $data = [
            "title" => "Chatbot",
        ];

        return view('chatbot.index', $data);
    }
}
