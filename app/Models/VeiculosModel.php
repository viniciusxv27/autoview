<?php

namespace App\Models;

use CodeIgniter\Model;

class VeiculosModel extends Model
{
    protected $table = 'veiculos'; 
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'link', 'tipo'];

    public function obterVeiculos($tipo)
    {
        return $this->where('tipo', $tipo)->findAll();
    }
    public function obterVeiculoId($tipo, $id)
    {
        return $this->where('tipo', $tipo)->where('id', $id)->first();
    }

    public function buscarVeiculo($id)
    {
        return $this->find($id);
    }

}
