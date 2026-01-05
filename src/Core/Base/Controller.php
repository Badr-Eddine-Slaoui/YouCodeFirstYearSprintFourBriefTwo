<?php

namespace Core\Base;

class Controller
{
    protected function view(string $view, array $data = [], string $layout = 'layout')
    {
        extract($data);

        $view = str_replace('.', '/', $view);

        $viewFile = __DIR__ . '/../../Views/' . $view . '.view.php';
        $layoutFile = __DIR__ . '/../../Views/layouts/' . $layout . '.view.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("View $view not found");
        }

        require $layoutFile;
    }
}
