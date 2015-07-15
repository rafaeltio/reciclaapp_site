<?php
/*
spl_autoload_register(function ($class)
{
	require_once(str_replace('\\', '/', $class . '.class.php'));
});
*/
spl_autoload_register( function ($className) 
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) 
    {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.class.php';

    require str_replace('\\', '/', $fileName);
});

echo json_encode(Entidade\LixoDenuncia::getAllData());
?>