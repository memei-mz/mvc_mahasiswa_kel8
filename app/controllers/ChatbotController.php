<?php

class ChatbotController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {

            header('Location: ' . BASEURL . '/auth/login');

            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Chatbot AI';

        $this->view('chatbot/index', $data);
    }
}
