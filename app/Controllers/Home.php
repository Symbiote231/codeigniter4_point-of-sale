<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex(): string  // getIndex instead of index to leverage autoRoutesImproved feature
    {
        return view('login');
    }
}
