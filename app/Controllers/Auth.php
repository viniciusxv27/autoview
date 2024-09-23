<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class Auth extends BaseController
{
    protected $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    public function login()
    {
        if (session()->has('status') || session()->get('status') === "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url(""));
        }

        return view('auth/login');
    }

    public function cadastro()
    {
        if (session()->has('status') || session()->get('status') === "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url(""));
        }
        
        return view('auth/cadastro');
    }

    public function cadastrar()
    {
        $senha = $this->request->getPost('senha');
        $confirmarSenha = $this->request->getPost('confirma_senha');

        if ($senha !== $confirmarSenha) {
            return redirect()->to(base_url("auth/cadastro"));
        }

        $rules = [
            'nome' => 'required',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'senha' => 'required|min_length[6]',
            'confirma_senha' => 'required|matches[senha]'
        ];

        if($this->validate($rules)){
            $data = [
                'nome' => $this->request->getPost('nome'),
                'email' => $this->request->getPost('email'),
                'senha' => md5($senha),
                'token' => $this->token(30),
            ];
    
            $usuarioID = $this->usuariosModel->criarUsuario($data);
            
            if ($usuarioID) {
                return redirect()->to(site_url('auth/login'));
            } else {
                $data['error'] = 'Erro ao cadastrar o cliente. Tente novamente.';
            }
        } else {
            return redirect()->to(base_url("auth/cadastro"));
        }
    }

    public function newpass()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'password' => md5($this->request->getPost('password')),
                'codigo' => '',
            ];

            $this->usuariosModel->definirCred($data);

            return redirect()->to(base_url("auth/login"));
        }
    }

    public function definepass($codigo)
    {

        if (!$this->usuariosModel->getCode($codigo) || $codigo == 0) {
            return redirect()->to(base_url("auth/login"));
        }

        return view('auth/novasenha');
    }

    public function recuperar()
    {

        $codigo = '';
        $caracteres_permitidos = '0123456789';

        for ($i = 0; $i < 6; $i++) {
            $codigo .= $caracteres_permitidos[rand(0, strlen($caracteres_permitidos) - 1)];
        }

        $data['url'] = base_url('auth/codigo/' . $codigo);

        $datacode = [
            'codigo' => $codigo,
        ];

        $this->usuariosModel->definirCred($datacode);

        $email = \Config\Services::email();

        $config = [
            'mailType' => 'html',
        ];

        $email->initialize($config);

        $email->setTo('contato@autoview3d.com.br');

        $template = view('emails/recover', $data);

        $email->setSubject('Recuperação de Senha | AutoView 3D');
        $email->setMessage($template);

        $send = $email->send();

        if (!$send) {
            var_dump($email->printDebugger());
        } else {
            return redirect()->to(base_url("auth/login"));
        }
    }

    public function masuk()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('password');
        $where = [
            'email' => $email,
            'senha' => md5($senha)
        ];
        $lihat = $this->usuariosModel->status($where);
        if ($lihat->getNumRows() > 0) {
            foreach ($lihat->getResult() as $xx) {
                $sess_data = [
                    'id' => $xx->id,
                    'user' => $xx->nome,
                    'email' => $xx->email,
                    'token' => $xx->token,
                    'assinatura' => $xx->assinante,
                    'assinatura_id' => $xx->subscription_id,
                    'status' => "AezakmiHesoyamWhosyourdaddy"
                ];
                session()->set($sess_data);
            }

            return redirect()->to(base_url());
        } else {
            echo "<script type='text/javascript'>alert('Usuário e/ou Senha Incorretos');window.location = './';</script>";
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }

    public function token($tamanho = 30)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $tamanho; $i++) {
            $token .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        if ($this->usuariosModel->checkToken($token)) {
            for ($i = 0; $i < $tamanho; $i++) {
                $token .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }
        }

        return $token;
    }
}
