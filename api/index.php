<?php

// if ($_SERVER['REQUEST_URI'] !== '/transpose' || $_SERVER['REQUEST_METHOD'] !== 'POST') {
//     http_response_code(404);
//     echo 'Not Found';
// }
xdebug_info();
require_once __DIR__ . '/endpoints/matrixTranspose/process_transpose_request.php';
echo "Hello World";
exit();
