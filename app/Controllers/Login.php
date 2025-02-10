<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    private $userModel;
    private $session;
    private $myLogger;

    public function __construct()
    {
        $this->myLogger = service('logger'); // Initialize logger here
        $this->userModel = new UserModel(); //Use UserModel DB layer

        if ($this->userModel->isConnected()) { // Validate connection to DB
            $this->session = session(); // Initialize session functionality
            log_message('debug', 'Initialized UserModel DB layer correctly');
            $this->myLogger->debug('Initialized UserModel DB layer correctly');
        } else {
            // $this->userModel = null; // If connection to DB failed set null value (casues Expected type 'object'. Found 'null'.)
            log_message('error', 'UserModel DB connection failure.');
            $this->myLogger->error('UserModel DB connection failure.');
            session()->setFlashdata('error', 'Database connection failed.'); // Set flash message in the session for the error
        }
    }

    public function postIndex(): RedirectResponse
    {
        // Check if there's an error set in the session
        if (session()->getFlashdata('error')) {
            return redirect()->back()->with('error', session()->getFlashdata('error'));
        }

        // Grab POST data
        $username = $this->request->getPost('userName');
        $password = $this->request->getPost('password');

        // Server-side validation for empty values in input controls
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Please fill in both fields.');
        }

        // Authentication logic:
        $userData = $this->userModel->getUser($username);

        if ($userData) {
            if (password_verify($password, $userData['password'])) {

                // Store user session
                $this->session->set([
                    'user_id' => $userData['id'],
                    'username' => $userData['username'],
                    'isLoggedIn' => true
                ]);

                // return redirect()->to('/dashboard');
                return redirect()->to('/login/welcome');
            } else {
                // If password authentication fails, show error
                return redirect()->back()->with('error', 'Invalid password.');
            }
        } else {
            // If username authentication fails, show error
            return redirect()->back()->with('error', 'Invalid username.');
        }
    }

    public function getWelcome(): string
    {
        $session = $this->session->get();
        return json_encode($session); // Convert the session array to a JSON string
    }

    public function getLogout(): RedirectResponse
    {
        session()->destroy(); // Destroy the session
        return redirect()->to('/'); // Redirect to the homepage
    }
}
