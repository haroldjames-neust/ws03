<?php

namespace Framework\middleware;
use Framework\Session;

class Authorize
{

    public function isAuthenticated()
    {
        return Session::has('user');
    }
    public function handle($role, $next)
    {
        if ($role === 'guest' && $this->isAuthenticated()) {
             return redirect('/');
        
        }elseif ($role === 'auth' && !$this->isAuthenticated()) {
             return redirect('/auth/login');
        }

    }
}