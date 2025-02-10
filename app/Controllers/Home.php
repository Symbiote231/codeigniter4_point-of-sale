<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex(): mixed  // getIndex instead of index to leverage autoRoutesImproved feature
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/login/welcome');
        }

        $data = [
            'title' => 'Login',
        ];

        return view('login', $data);
    }
}
