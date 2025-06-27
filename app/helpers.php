<?php
declare(strict_types=1);

use Illuminate\View\Factory as ViewFactory;

if (!function_exists('view')) {
    /**
     * Render Blade šablónu a priamo ju vypíše (echo).
     *
     * @param string $path Dot notation (napr. 'contacts.index')
     * @param array $data Dáta pre šablónu
     */
    function view(string $path, array $data = []): void
    {
        /** @var ViewFactory $view */
        $view = app(ViewFactory::class);
        echo $view->make($path, $data)->render();
    }
}

if (!function_exists('view_content')) {
    /**
     * Render Blade šablónu a vráti jej výsledok ako string.
     *
     * @param string $path Dot notation (napr. 'contacts._partials.table-row')
     * @param array $data Dáta pre šablónu
     * @return string Renderovaný HTML obsah
     */
    function view_content(string $path, array $data = []): string
    {
        /** @var ViewFactory $view */
        $view = app(ViewFactory::class);
        return $view->make($path, $data)->render();
    }
}
