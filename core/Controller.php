<?php

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);

        ob_start();

        require_once '../app/views/' . $view . '.php';

        $content = ob_get_clean();

        require_once '../app/views/layouts/header.php';

        echo $content;

        require_once '../app/views/layouts/footer.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function flash()
    {
        if (isset($_SESSION['flash'])) {

            $flash = $_SESSION['flash'];

            echo '
                <div class="alert alert-' . $flash['type'] . '">
                    ' . $flash['message'] . '
                </div>
            ';

            unset($_SESSION['flash']);
        }
    }
}
