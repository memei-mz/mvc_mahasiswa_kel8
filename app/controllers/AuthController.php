<?php

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = $this->model('User');

            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {

                $_SESSION['error'] = 'Username atau password salah';

                header('Location: ' . BASEURL . '/auth/login');
                exit;
            }
        }

        $data['title'] = 'Login';

        $this->view('auth/login', $data);
    }

    public function logout()
    {
        session_destroy();

        header('Location: ' . BASEURL . '/auth/login');

        exit;
    }
}
