<?php

namespace App\Controllers;

use App\Models\VeiculosModel;
use App\Models\UsuariosModel;

class Api extends BaseController
{
    protected $veiculosModel;
    protected $usuariosModel;

    public function __construct()
    {
        $this->veiculosModel = new VeiculosModel();
        $this->usuariosModel = new UsuariosModel();
    }

    public function alterar_informacoes()
    {
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');

        
        if ($nome == null || $email == null) {
            $nome = $this->request->getJSON()->nome;
            $email = $this->request->getJSON()->email;
        }

        $this->usuariosModel->alterarInformacoes(session()->get('id'), $nome, $email);

        session()->set('user', $nome);
        session()->set('email', $email);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function adicionar_parte() {}

    public function retirar_parte() {}

    public function cancelar_assinatura()
    {

        $sub_id = $this->request->getPost('sub_id');

        if (empty($sub_id)) {
            $sub_id = (array)$this->request->getJSON()->sub_id;
        }

        $stripe = new \Stripe\StripeClient('sk_test_51O7kFlHBn7GJcEdFrhU6nzitMfn5K1m3PMOBz7aOuwD6ZXjGq7QgbqoT128Eszhmx9Sn0U9iYcy0HHe0zNdopk9j00RdNQnO6l');

        $stripe->subscriptions->cancel($sub_id[0]);

        $this->usuariosModel->cancelarAssinatura($sub_id[0]);

        session()->set('assinatura', '0');
        session()->set('assinatura_id', '');

        return $this->response->setJSON(['message' => 'Assinatura cancelada']);
    }

    public function confirmar_assinatura()
    {
        helper('filesystem');
        $postData = $this->request->getPost();

        if (empty($postData)) {
            $postData = (array)$this->request->getJSON(true);
        }

        if ($this->usuariosModel->assinatura($postData['data']['object']['subscription'], $postData['data']['object']['customer_details']['email'])) {
            return $this->response->setJSON(['message' => 'Usuário adquiriu a assinatura']);
        } else {
            return $this->response->setJSON(['message' => 'Falha ao completar pagamento'], 500);
        }
    }

    public function alterar_token()
    {
        $id = $this->request->getPost('id');
        $token = $this->request->getPost('token');
        $token_antigo = $this->request->getPost('token_antigo');

        if ($token == null) {
            $token = $this->request->getJSON()->token;
            $token_antigo = $this->request->getJSON()->token_antigo;
            $id = $this->request->getJSON()->id;
        }

        if (!$this->usuariosModel->verificarToken($token_antigo)) {
            return $this->response->setJSON(['error' => 'Token inválido'], false);
        }

        $this->usuariosModel->alterarToken($id, $token);
        session()->set('token', $token);

        return $this->response->setJSON(['message' => 'Token trocado']);
    }

    public function carros($id = null)
    {

        $token = $this->request->getPost('token');

        if ($token == null) {
            $token = $this->request->getJSON()->token;
        }

        if ($this->usuariosModel->verificarToken($token)) {

            if ($id != null) {
                $data['veiculos'] = $this->veiculosModel->obterVeiculoId('carro', $id);
            } else {
                $data['veiculos'] = $this->veiculosModel->obterVeiculos('carro');
            }

            $this->usuariosModel->adicionarRequisicao($token);

            if ($data['veiculos']) {
                return $this->response->setJSON($data, true);
            } else {
                return $this->response->setJSON(['error' => 'Nenhum veículo encontrado'], false);
            }
        } else {
            return $this->response->setJSON(['error' => 'Token inválido'], false);
        }
    }

    public function motos($id = null)
    {

        $token = $this->request->getPost('token');

        if ($token == null) {
            $token = $this->request->getJSON()->token;
        }

        if ($this->usuariosModel->verificarToken($token)) {

            if ($id != null) {
                $data['veiculos'] = $this->veiculosModel->obterVeiculoId('moto', $id);
            } else {
                $data['veiculos'] = $this->veiculosModel->obterVeiculos('moto');
            }

            $this->usuariosModel->adicionarRequisicao($token);

            if ($data['veiculos']) {
                return $this->response->setJSON($data, true);
            } else {
                return $this->response->setJSON(['error' => 'Nenhum veículo encontrado'], false);
            }
        } else {
            return $this->response->setJSON(['error' => 'Token inválido'], false);
        }
    }
    public function caminhoes($id = null)
    {

        $token = $this->request->getPost('token');

        if ($token == null) {
            $token = $this->request->getJSON()->token;
        }

        if ($this->usuariosModel->verificarToken($token)) {

            if ($id != null) {
                $data['veiculos'] = $this->veiculosModel->obterVeiculoId('caminhao', $id);
            } else {
                $data['veiculos'] = $this->veiculosModel->obterVeiculos('caminhao');
            }

            $this->usuariosModel->adicionarRequisicao($token);

            if ($data['veiculos']) {
                return $this->response->setJSON($data, true);
            } else {
                return $this->response->setJSON(['error' => 'Nenhum veículo encontrado'], false);
            }
        } else {
            return $this->response->setJSON(['error' => 'Token inválido'], false);
        }
    }
    public function maquinas($id = null)
    {

        $token = $this->request->getPost('token');

        if ($token == null) {
            $token = $this->request->getJSON()->token;
        }

        if ($this->usuariosModel->verificarToken($token)) {

            if ($id != null) {
                $data['veiculos'] = $this->veiculosModel->obterVeiculoId('maquina', $id);
            } else {
                $data['veiculos'] = $this->veiculosModel->obterVeiculos('maquina');
            }

            $this->usuariosModel->adicionarRequisicao($token);

            if ($data['veiculos']) {
                return $this->response->setJSON($data, true);
            } else {
                return $this->response->setJSON(['error' => 'Nenhum veículo encontrado'], false);
            }
        } else {
            return $this->response->setJSON(['error' => 'Token inválido'], false);
        }
    }
}
