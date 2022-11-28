<?php

require __DIR__.'/vendor/autoload.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'index';


// @see https://twig.symfony.com/doc/3.x/api.html
$loader = new \Twig\Loader\FilesystemLoader([ __DIR__.'/templates' ]);
$twig = new \Twig\Environment( $loader, [
    'cache' => __DIR__.'/cache',
] );

$template_file = $page.'.html.twig';

if( ! $loader->exists( $template_file ) ) {
    $template_file = '404.html.twig';
}

// Create template
$template = $twig->load($template_file);

echo $template->render(['page' => $page]);