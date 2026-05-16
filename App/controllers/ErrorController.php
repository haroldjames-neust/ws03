<?php
namespace App\Controllers;

use Framework\Database;

class ErrorController {
     
    public static function notFound($message = 'Page Not Found') {
        http_response_code(404);
        loadView('error', [
            'status'  => 404, 
            'message' => $message
        ]);
    }

    public function unauthorized($message = 'You are not authorized to access this page') {
        http_response_code(403);
        loadView('error', [
            'status'  => 403, 
            'message' => $message
        ]);
    }
}