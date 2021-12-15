<?php

namespace App;

use Controller\Controller;

class App
{
    public static function start()
    {
        return self::route();
    }

    public static function route()
    {
        $show = true;
        Controller::view('links', [
            'show' => $show
        ]);

        $userUri = $_SERVER['REQUEST_URI'];
        $userUri = str_replace(INSTALL_DIR, '', $userUri);
        $userUri = preg_replace('/\?/', '', $userUri);
        $userUri = explode('/', $userUri);
        if (
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            $userUri[1] == 'create'  &&
            count($userUri) == 2
        ) {
            return (new Controller)->create_bill();
        } elseif (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            'saskaita' == $userUri[1] &&
            count($userUri) == 2
        ) {
            return (new Controller)->bill();
        } elseif (
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            'pdf' == $userUri[1] &&
            count($userUri) == 2
        ) {
            return (new Controller)->pdf();
        }
    }
}
