<?php

namespace App\Controllers;

use App\Models\AcessosModel;
use App\Models\VeiculosModel;
use App\Models\UsuariosModel;

class App extends BaseController
{
    protected $acessosModel;
    protected $usuariosModel;
    protected $veiculosModel;

    public function __construct()
    {

        $this->veiculosModel = new VeiculosModel();
        $this->usuariosModel = new UsuariosModel();
        $this->acessosModel = new AcessosModel();

    }

    public function dashboard()
    {
        if (!session()->has('status') || session()->get('status') !== "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url("auth/login"));
        }

        $this->log();

        $data['assinantes'] = $this->usuariosModel->where('assinante', 1)->countAllResults();
        if(session()->get('assinatura') === '2'){
            $data['requisicoes'] = $this->usuariosModel->select('SUM(requisicoes) as total_requisicoes')->first()['total_requisicoes'];
        } else {
            $data['requisicoes'] = $this->usuariosModel->where('token', session()->get('token'))->first()['requisicoes'];
        } 

        $data['dadosM'] = $this->total_acessos_mes();
        $data['chart_data'] = json_encode($data['dadosM']);
        return view('__header') . view('dashboard', $data) . view('__footer');
    }
    
    public function veiculos()
    {
        if (!session()->has('status') || session()->get('status') !== "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url("auth/login"));
        }
        
        $data['veiculos'] = $this->veiculosModel->findAll();

        return view('__header') . view('veiculos', $data) . view('__footer');
    }
    
    public function alterar_informacoes()
    {
        if (!session()->has('status') || session()->get('status') !== "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url("auth/login"));
        }

        return view('__header') . view('alterar_informacoes') . view('__footer');
    }
    
    public function veiculo($id)
    {
        if (!session()->has('status') || session()->get('status') !== "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url("auth/login"));
        }
        
        $data['veiculo'] = $this->veiculosModel->buscarVeiculo($id);

        return view('__header') . view('veiculo', $data) . view('__footer');
    }
    
    public function token()
    {
        if (!session()->has('status') || session()->get('status') !== "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url("auth/login"));
        }

        return view('__header') . view('token') . view('__footer');
    }
    
    public function conta()
    {
        if (!session()->has('status') || session()->get('status') !== "AezakmiHesoyamWhosyourdaddy") {
            return redirect()->to(base_url("auth/login"));
        }

        return view('__header') . view('conta') . view('__footer');
    }
    
    public function docs()
    {
        return view('docs');
    }

    public function log()
    {
        $ip_address = $this->request->getIPAddress();
        $user_agent = $this->request->getUserAgent();

        $is_mobile = $this->isMobileUserAgent($user_agent);

        $tipo = $is_mobile ? 'Mobile' : 'PC';

        $data = [
            'ip' => $ip_address,
            'navegador' => $user_agent,
            'tipo' => $tipo,
            'data' => date('Y-m-d')
        ];

        $this->acessosModel->inserir_acesso($data);
    }

    private function isMobileUserAgent($user_agent)
    {
        $mobile_keywords = ['Mobile', 'Android', 'iPhone', 'iPad', 'Windows Phone'];

        foreach ($mobile_keywords as $keyword) {
            if (stripos($user_agent, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }


    public function total_acessos_mes()
    {
        $ano = date('Y');
        $total_acessos = [];

        for ($mes = 1; $mes <= 12; $mes++) {
            $total_acessos[$mes] = $this->acessosModel->where('YEAR(data)', $ano)
                ->where('MONTH(data)', $mes)
                ->countAllResults();
        }

        return $total_acessos;
    }
}
