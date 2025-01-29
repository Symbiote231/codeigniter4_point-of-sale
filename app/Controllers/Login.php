<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function postIndex(): mixed
    {
        // Grab POST data
        $username = $this->request->getPost('userName');
        $password = $this->request->getPost('password');

        // Example server-side validation
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Please fill in both fields.');
        }

        // Continue with authentication logic
        return 'TEST';
    }
}
