rem<?php
session_start();
// Verifica se o usuário está autenticado
if (!isset($_SESSION["email"])) {
    header("Location: ../aetherius/tela-login-erro.html"); // Redireciona para a página de erro
    exit;
}
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
            height: 600px;
            width: 96%;
            margin: 0 auto;
        }
    </style>
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
    <main>
        <div class="box-formulario">
            <div class="container mt-5">
                <h1 class="mb-4">Cadastro de GásNet</h1>
                <form id="form-dispositivo" action="../aetherius/php/registrar-dispositivos.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP:</label>
                        <input type="text" class="form-control" id="cep" name="cep" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_rua" class="form-label">Nome da Rua:</label>
                        <input type="text" class="form-control" id="end_rua" name="end_rua" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número da Residência:</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </main>
    
    <script>
        document.getElementById('cep').addEventListener('change', function() {
            var cep = this.value;
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
    
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('end_rua').value = data.logradouro;
                })
                .catch(error => console.error('Erro ao obter dados do CEP:', error));
        });
    </script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
