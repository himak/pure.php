<?php
declare(strict_types=1);

if (!function_exists('view')) {
    function view(string $path, array $data = []): void
    {
        extract($data); // vytvorí premenné z asociatívneho poľa
        include __DIR__ . '/../resources/views/' . str_replace('.', '/', $path) . '.php';
    }
}

if (!function_exists('view_content')) {
    function view_content(string $path, array $data = []): string
    {
        extract($data);
        ob_start();
        include __DIR__ . '/../resources/views/' . str_replace('.', '/', $path) . '.php';
        return ob_get_clean();
    }
}
