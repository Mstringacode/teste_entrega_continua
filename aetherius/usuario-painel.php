<?php
session_start();
// Verifica se o usuário está autenticado
if (!isset($_SESSION["email"])) {
    header("Location: ../aetherius/tela-login-erro.html"); // Redireciona para a página de erro
    exit;
}
require_once '../aetherius/php/busca-dispositivos.php';

try {
    // Query para recuperar os dados do banco de dados
    $query = "SELECT valor_gas FROM medidas";

    // Prepara a query
    $stmt = $conn->prepare($query);
    // Executa a query
    $stmt->execute();

    // Recupera os resultados da consulta
    $data = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Se não houver resultados, defina um valor padrão para $data
    if (empty($data)) {
        $data = array(0);
    }
} catch (PDOException $e) {
    // Em caso de erro na conexão ou na consulta, você pode tratar o erro aqui
    echo "Erro: " . $e->getMessage();
}

// Formata os dados em um formato que o JavaScript pode entender
$labels = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho"];
$dados = [
    "labels" => $labels,
    "datasets" => [
        [
            "label" => "Dados",
            "data" => $data,
            "fill" => false,
            "borderColor" => "rgb(255, 0, 0)",
            "tension" => 0.1
        ]
    ]
];

// Codifica os dados em JSON para passar para o JavaScript
$dados_json = json_encode($dados);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GásNet - Painel Administrativo</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../aetherius/css/style-usuario.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Importando API do Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YSTUxiBSjPCGRMk7o3t3fGDve1BZSxE&callback=initMap" async defer></script>
    <style>
        #map {
            height: 400px;
            width: 80%;
            margin: 0 auto;
            padding: 10px;
            margin-bottom: 100px;
        }
    </style>
    <!-- Gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="../aetherius/assets/logo.png" width="70" height="70" alt="" srcset="">
        <a class="navbar-brand ps-3" href="#"><strong>GásNet</strong></a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-lg-4">
            <li class="nav-item dropdown d-flex justify-content-end">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../aetherius/usuario-perfil.php">Meu Perfil</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../aetherius/index.html">Sair</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Painel</div>
                        <a class="nav-link" href="../aetherius/usuario-painel.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-map"></i></i></div>
                            Mapa
                        </a>
                        <div class="sb-sidenav-menu-heading">Cadastro</div>
                        <a class="nav-link" href="../aetherius/usuario-dispositivos.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-laptop-code"></i></i></div>
                            Dispositivos
                        </a>
                    
                    <div class="sb-sidenav-menu-heading">Alertas</div>
                    <a class="nav-link" href="../aetherius/usuario-configuracao.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
                        Configurações
                    </a>
                    <div class="sb-sidenav-menu-heading">Recursos</div>
                    <a class="nav-link" href="../aetherius/usuario-logs.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-font-awesome"></i></div>
                        Log Viewer
                    </a>
                    </div>
                    </div>
                    
                </div>
            </nav>
        </div>
        </div>
    </div>
    <!-- ... -->
    <div class="body2">
        <br>
        <main>
        <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2></h2>
                <table class="table" id="tabela_dispositivos">
                    <tbody>
                        <?php include '../aetherius/php/consulta-lista.php'; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 p-5">
                <canvas id="myChart" width="200" height="200"></canvas>
                <script>
                    var dados = <?php echo $dados_json; ?>;
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                    type: 'line',
                    data: dados,
                    });
                </script>
            </div>
        </div>
        </div>
            <!--<div class="container-mapa">
                <h2 class="display-3 mb-3">Meus Sensores</h2>
                Div para exibir o mapa -->
                <div class="mt-5"></div>
                <div id="map"></div>
            </div>
            <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -22.4377, lng: -46.8223 },
                zoom: 16
            });
            // Array de endereços PHP convertido para JavaScript
            var addresses = <?php echo json_encode($addresses); ?>;
            // Itera sobre os endereços e adiciona marcadores
            addresses.forEach(function(address) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'address': address }, function(results, status) {
                    if (status === 'OK') {
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            title: address,
                            icon: {
                                url: '../aetherius/assets/logo.png', // Caminho para o seu ícone personalizado
                                scaledSize: new google.maps.Size(60, 60) // Tamanho do ícone (largura, altura)
                            }
                        });
                    } else {
                        console.error('Geocodificação falhou para o endereço ' + address + ': ' + status);
                    }
                });
            });
        }
                </script>
        </div>
        <div class="mb-5"></div>
        </main>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
