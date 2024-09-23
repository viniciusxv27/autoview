<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Documentação | AutoView 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Somos uma empresa especialista em desenvolvimento de APIs (Application Programming Interface) para diversos setores. Possuimos serviços web voltados a empresas e pessoas físicas que desejam obter dados e informações em tempo real de maneira rápida e fácil.">
    <meta name="keywords" content="API, API Placas, API Veículares, dados veículares, consulta placa, consulta placas, consultar veículo, dados de carros, consulta carro, consulta roubo, consulta moto, sinesp, consulta veícular, consulta dados de veículos, API Carros, api, api placas, json">
    <meta name="author" content="WD Desenvolvimento">
    <meta name="copyright" content="2016 - 2022 | WD Desenvolvimento">
    <meta name="rating" content="general">
    <meta name="robots" content="all">

    <!-- Facebook -->
    <meta property="og:title" content="API Placas | Documentação" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://apiplacas.com.br/doc.php" />
    <meta property="og:image" content="https://apiplacas.com.br/assets/images/cc3.jpg" />
    <meta property="og:description" content="Somos uma empresa especialista em desenvolvimento de APIs (Application Programming Interface) para diversos setores. Possuimos serviços web voltados a empresas e pessoas físicas que desejam obter dados e informações em tempo real de maneira rápida e fácil." />

    <!-- CSS | Mobile -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">

    <!-- FAVICON -->
    <link rel='icon' href='assets/images/logoC.png' type='image/png'>
    <link rel='shortcut icon' href='assets/images/logoC.ico' type='img/x-icon'>
    <meta name="msapplication-TileColor" content="#2d2d2d">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#2d2d2d">


    <!-- JS -->
    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="assets/css/apvs.css?1818">


    <!-- SWEETALERT -->
    <script src="js/sweetalert2.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css" crossorigin="anonymous">

    <style>
        .container-fluid {
            min-height: 80%;
        }
    </style>

</head>

<style>
    @media (max-width: 992px) {
        .navbar-brand {
            margin-right: 0rem;
        }

        #navbar-logo {
            height: auto;
            width: 150px;
        }
    }
</style>

<body style="background-color: #ecf0f1;
 ">

    <div class="container-fluid">

        <div class="container">
            <div class="mb-5 mt-5">
                <div class="text-center">
                    <h1 style="font-weight:bold; color: #333" class="display-4">Documentação</h1>
                    <div class="strike mb-3 mt-1 lead">
                        <span style="font-weight:bold; color: #333">Confira a documentação da API</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-8 mb-1">

                <div class="card border-0 shadow mb-5">
                    <div class="card-body p-4">


                        <div class="col-lg-12 mt-2 mb-5">
                            <h4 class="h4 text-muted">Sobre</h4>

                            <p class="lead">A AutoView 3D fornece modelos 3D de veiculos através do ID do veiculo.</p>
                        </div>


                        <div class="col-lg-12 mt-5 mb-5">
                            <h4 class="h4 text-muted">Token</h4>

                            <p class="lead">Os tokens para uso da API são fornecidos após a criação de seu <a href="<?php echo base_url('auth/cadastro') ?>">Cadastro</a> conosco. Após sua assinatura você receberá um token para as consultas de todos os modelos disponiveis em nossa dashboard.
                            <p>

                            <p class="lead">Para visualizar seus tokens, basta efetuar o login de sua conta e ir até o menu <a href="<?php echo base_url('token') ?>">Token</a>.
                            <p>

                        </div>



                        <div class="col-lg-12 mt-5 mb-5">

                            <h4 class="h4 text-muted">Informações</h4>


                            <p class="lead">A API fornece os dados através de uma URL utilizando o método (POST).<br>Segue abaixo a url de exemplo:</p>

                            <div class="bd-highlight mb-3">
                                <div class="lead py-2 px-3 url-api" style="border-radius: 0.3rem; background-color: #f7f7f7; max-width: 650px;">https://autoview.inovadesenvolvimentos.com.br/api/<b>tipo_do_veiculo</b>/{id}</div>
                            </div>

                            <p class="lead">O parâmetro <b>(tipo_do_veiculo)</b> deve ser informado como: <b>carros</b>, <b>motos</b>, <b>caminhoes</b> ou <b>maquinas</b>.</p>

                            <div class="alert alert-warning mb-4 mt-4" role="alert">
                                O parametro <b>{id}</b> é opcional, se usado retornará apenas o veiculo do id indicado.</div>

                            <div class="alert alert-warning mb-4 mt-4" role="alert">
                                O <u><a href="<?php echo base_url('token') ?>">Auth Token</a></u> é obrigatório em todas as consultas sendo enviado como: <br><br> { <br> "token" : "{Auth Token}" <br> }
                            </div>

                        </div>

                        <hr>

                        <div class="col-lg-12 mt-5 mb-5">

                            <h4 class="h4 text-muted mb-5">Utilização da API</h4>

                            <h5 class="h5 text-muted mt-5">Todos os Carros</h5>

                            <p class="lead">Para obter os dados de todos os carros basta informar o tipo "carros" e o seu token no (body).<br> Mostramos neste exemplo, veja como fica abaixo.</p>


                            <div class="bd-highlight mb-3">
                                <div class="lead py-2 px-3 url-api" style="border-radius: 0.3rem; background-color: #f7f7f7; max-width: 550px;">https://autoview.inovadesenvolvimentos.com.br/api/<b>carros</b></div>
                            </div>

                            <p class="lead">Você receberá os dados no formato JSON:</p>

                            <div class="jumbotron mb-0">
                                <div class="container">
                                    <pre><code>
{
    "veiculos": [
      {
        "id": "1", 
        "nome": "Mercedes Benz C63 AMG", 
        "link": "div class=\"sketchfab-embed-wrapper\"> iframe title=\"Mercedes Benz C63 AMG\" frameborder=\"0\" allowfullscreen mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\" allow=\"autoplay; fullscreen; xr-spatial-tracking\" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src=\"https://sketchfab.com/models/38eb721c70d34046a60ef7a8984024c5/embed\"> /iframe /div",
        "tipo": "carro', 
      },
      {
        "id": "2", 
        "nome": "Audi Q7 V12 TDI", 
        "link": "div class=\"sketchfab-embed-wrapper\"> iframe title=\"2009 Audi Q7 V12 TDI\" frameborder=\"0\" allowfullscreen mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\" allow=\"autoplay; fullscreen; xr-spatial-tracking\" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src=\"https://sketchfab.com/models/02b9a8652d11469d904b404ff5095277/embed\"> /iframe /div", 
        "tipo": "carro",
      }
    ]
}
												</code></pre>
                                </div>

                            </div>


                        </div>

                        <hr>

                        <div class="col-lg-12 mt-5 mb-5">
                            <h5 class="h5 text-muted">Códigos de retorno</h5>

                            <table class="table table-striped table-bordered table-responsive-lg mb-4">

                                <tbody>

                                    <tr>
                                        <td>200</td>
                                        <td>Retorno com sucesso.</td>
                                    </tr>

                                    <tr>
                                        <td>400</td>
                                        <td>URL incorreta!</td>
                                    </tr>

                                </tbody>
                            </table>

                            <p class="lead">Todos os códigos de erro retornam com uma mensagem detalhando o erro. <br>Exemplo:</p>
                            <div class="jumbotron mb-0">
                                <div class="container">
                                    <pre><code>
{
    "error": "Método não permitido"
}
												</code></pre>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


<footer style="background-color: #2d2d2d; " class="footer mt-auto">

    <div class="text-center py-3 pl-2 pr-2" style="color: #9b9b9b; background-color: #3a3a3a; font-size: 15px;">
        © <b>Inova Desenvolvimentos </b> - Todos os direitos reservados - CNPJ <b>55.261.467/0001-87</b>
    </div>
</footer>
</html>