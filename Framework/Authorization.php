<?php
namespace Framework;

use Framework\Session;

class Authorization
{
    public static function isOwner($resourceUserId)
    {
        $sessionUser = Session::get('user');
        if ($sessionUser !== null && isset($sessionUser['id'])) {
            $sessionUserId = (int) $sessionUser['id'];
            return $sessionUserId === $resourceUserId;
        }
        return false;
    }
}