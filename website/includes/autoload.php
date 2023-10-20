<?php
spl_autoload_register(function ($class) {
    $directories = ['controllers', 'models', 'views'];
    foreach ($directories as $directory) {
        $file =file_exists(__DIR__ .'/'. $directory .'/'. $class .'.php');
        if (file_exists($file)) {
            include $file;
            return;
        }
    }
});
?>