<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios'; 
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'email', 'senha', 'codigo', 'token', 'requisicoes', 'assinante', 'subscription_id'];

    public function verificarToken($token)
    {
        return $this->where('token', $token)->countAllResults();
    }

    public function alterarInformacoes($id, $nome, $email)
    {
        return $this->set('nome', $nome)->set('email', $email)->where('id', $id)->update();
    }
    
    public function alterarToken($id, $token)
    {
        return $this->set('token', $token)->where('id', $id)->update();
    }

    public function adicionarRequisicao($token)
    {
        $this->db->table('usuarios')
            ->set('requisicoes', 'requisicoes + 1', false)
            ->where('token', $token)
            ->update();
    }

    public function checkToken($token)
    {
        return $this->where('token', $token)->get();
    }
    
    public function assinatura($sub_id, $email)
    {
        return $this->set('assinante', 1)->set('subscription_id', $sub_id)->where('email', $email)->update();
    }
    
    public function cancelarAssinatura($sub_id)
    {
        return $this->set('assinante', 0)->set('subscription_id', '')->where('subscription_id', $sub_id)->update();
    }
    
    public function criarUsuario($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function status($where)
    {
        return $this->where($where)->get();
    }
    
    public function definirCred($data)
    {
        return $this->update(1, $data);
    }

    public function getCode($code)
    {
        return $this->where('codigo', $code)->findAll();
    }

}
