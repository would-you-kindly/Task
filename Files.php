<?php

$method = $_SERVER['REQUEST_METHOD'];
$file = $_REQUEST['file'];

switch ($method) {
    case 'HEAD':
        echo filesize($file);
        break;
    case 'GET':
        echo file_get_contents($file);
        break;
    case 'POST':
        file_put_contents($file, http_get_request_body());
        break;
    case 'DELETE':
        unlink($file);
        break;
    case 'PATCH':
        $content = file_get_contents($file);
        file_put_contents($file, $content . http_get_request_body());
        break;
}

?>