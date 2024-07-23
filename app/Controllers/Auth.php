<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('auth/userLogin');
    }

    public function loginAuth(): \CodeIgniter\HTTP\RedirectResponse|string
    {
        $session = session();
        $model = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return view('auth/userLogin');
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return view('auth/userLogin');
        }
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}
