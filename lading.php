<?php
session_start();
ob_start();
include_once 'config/conexao.php';

if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
    $_SESSION['msg_error'] = "<h5 style='color: white; height: 5px; text-align: center ;'> Acesso negado! Faça o login</h5>";
    header("location: login.php");
    exit(); // Certifique-se de sair após redirecionar
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/iconsbootstrap/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>iceFest</title>

</head>



<body class=" bdy">

    <div class="container-fluid mt-3">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <h5 class="welcome mx-1">Bem vindo
                    <?php echo $_SESSION['nome']; ?>!
                </h5>
                <div class="d-flex align-items-center justify-content-center">
                    <button class="navbar-toggler bg-white mx-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="collapse navbar-collapse w-100" id="navbarNav">
                <ul class="navbar-nav ">
                    <?php
                    if ($_SESSION['tipo_admin'] == 'Administrador Geral') {
                        echo '<li class="nav-item"><a href="#" class="nav-link text-light me-4" href="#" data-bs-toggle="modal" data-bs-target="#modalCadAdm">Cadastrar novo Adm</a></li>';
                        echo '<li class="nav-item"><a href="#" class="nav-link text-light me-4" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Controle de acesso</a></li>';
                        echo '<li class="nav-item"><a href="#" class="nav-link text-light me-4" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Painel de controle</a></li>';
                        echo '<li class="nav-item"><a href="sair.php" class="nav-link text-light me-4">Sair</a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="sair.php" class="nav-link text-light mx-5">Sair</a></li>';
                    }
                    ?>
                </ul>
            </div>
    </div>
    </nav>

    </div>


    <script>
        // Código JavaScript para fechar o alerta após 3 segundos
        setTimeout(function () {
            document.getElementById('alertMsgCad').style.display = 'none';
        }, 5000);
    </script>

    <style>
        .bdy {
            background-color: #a8ffde;
        }



        .ladingImage {
            background-image: url('./img/assai10.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 300px;
            color: #fff;
            text-align: center;
            margin-top: -3%;
            width: 100vw;
            /* Usando 100vw (viewport width) para cobrir 100% da largura do corpo */

        }

        .cadAdm {
            margin-top: 03% !important;
            transform: translateX(22%);
        }

        .custom-container-class .swal2-popup {
            margin-left: 1% !important;
            margin-top: 01% !important;
            width: 30%;
        }

        @media (min-width: 280px) and (max-width: 325px) {
            .cadAdm {
                margin-left: -07%;
                width: 80%;
                top: 3%;
                max-height: 100vh;
            }

            .painel {
                flex-wrap: wrap;
                position: absolute;
                margin-top: 07%;
            }

            .custom-container-class .swal2-popup {
                margin-left: 170px !important;
                margin-top: 5px;
                width: 30%;
            }

            .bdy {
                background-color: black;
            }

            .ladingImage {
                height: 89vh;
                margin-top: 1%;
                flex-wrap: wrap;
            }
        }

        @media (min-width: 667px) {
            .cadAdm {
                margin-left: -3.3%;
                width: 80%;
                top: 3%;
                max-height: 100vh;
            }
        }

        @media (min-width: 896px) {
            .cadAdm {
                margin-left: -3.5%;
                width: 80%;
                top: 3%;
                max-height: 100vh;
            }
        }

        @media only screen and (min-width: 326px) and (max-width: 768px) {
            .painel {
                flex-wrap: wrap;
                position: absolute;
                margin-top: 07%;


            }

            .cadAdm {
                left: -27px;
                width: 80%;
                top: 05g% !important;
                height: 99.7vh;

            }


            .custom-container-class .swal2-popup {
                margin-left: 07px !important;
                margin-top: 5px;
                width: 100%;
            }


            .bdy {
                background-color: black;
            }

            .custom-swal-container {
                margin-left: 04%;
            }

            .welcome {
                margin-left: 20%;
            }

            .box {
                width: 48%;
            }

            .box7 {
                width: 100%;
            }


            .ladingImage {
                width: 100vh;
                height: 100vh;

            }
        }

        @media only screen and (min-width: 769px) and (max-width: 896px) {
            .ladingImage {
                height: 85vh;
                margin-top: 1%;
                flex-wrap: wrap;
                width: 100vw;
            }

            .painel {
                margin-top: 03%;
                position: absolute;

            }

            .cadAdm {
                left: -40px;
                width: 83%;
                margin-top: -3%;
                height: auto;
            }

            .custom-container-class .swal2-popup {
                margin-left: 37px !important;
                margin-top: 20px;
            }

            .box {
                width: 48%;
                margin: 2px;
            }

            .box7 {
                width: 48%;
            }


        }


        .custom-swal-container {
            margin-right: 06%;
        }

        @media only screen and (min-width: 897px) and (max-width: 1368px) {
            .ladingImage {
                height: 85vh;
                margin-top: 1%;
                flex-wrap: wrap;
                width: 100vw;
            }

            .painel {
                margin-top: 03%;
                position: absolute;

            }

            .cadAdm {
                left: -40px;
                width: 83%;
                margin-top: -1%;
                height: auto;
            }

            .box {
                width: 48%;
                margin: 2px;
            }

            .box7 {
                width: 48%;
            }

            .custom-container-class .swal2-popup {
                margin-left: 05% !important;
                margin-top: 5px;
            }


        }

        @media (min-width: 1281px) {
            .custom-container-class .swal2-popup {
                margin-left: 09% !important;
                margin-top: 09%;
            }
        }

        @media (min-width: 1368px) {
            .custom-container-class .swal2-popup {
                margin-left: 09% !important;
                margin-top: 09%;
            }
        }


        .custom-swal-container {
            margin-right: 06%;
        }
    </style>

    <!-- Painel de controle -->


    <div class="container-fluid  painel">
        <div class="box box border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class="bi bi-card-list text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Ingredientes</h5>
                </div>
            </a>
        </div>

        <div class="box box border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class="bi bi-box2-heart  text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Produtos</h5>
                </div>
            </a>
        </div>

        <div class="box box border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class="bi bi-list-stars  text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Pedidos</h5>
                </div>
            </a>
        </div>

        <div class="box box border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class=" bi bi-chat-left-text  text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Mensagens</h5>
                </div>
            </a>
        </div>


        <div class="box box border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class=" bi bi-whatsapp  text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Whatzapp</h5>
                </div>
            </a>
        </div>


        <div class="box box border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class="bi bi-person-bounding-box  text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Cientes</h5>
                </div>
            </a>
        </div>


        <div class=" box7 border border-dark border border-1 rounded-4 bg-danger-subtle text-center">
            <a href="#" class="text-decoration-none text-dark">
                <i class="bi bi-cash-coin text-center" style="font-size: 2rem;"></i>
                <div class="card-body">
                    <h5 class="text-center" style="font-size: 1rem;"> Financeiro</h5>
                </div>
            </a>
        </div>
    </div>
    </div>
    <!-- fim painel de controle -->

    <!-- banner  -->
    <div class=" ladingImage mx-auto " style=" width: 95%; height:84vh;"></div>
    <!-- fim banner -->







    <!-- Modal -->
    <div class="modal fade  cadAdm" id="modalCadAdm" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content h-25">
                <div class="modal-body bg-secondary-subtle text-emphasis-secondary  p-1 rounded-2">

                    <div class="d-flex justify-content-between">
                        <h4 class="">Cadastrar novo Adm</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="border border-dark rounded-3">

                        <form method="POST" action="cad.php" class="p-1" id="cadAdm">

                            <input type="text" class="form-control mb-3" id="inputNomeAdm" name="nome"
                                placeholder="Digite o nome" required>

                            <input type="email" class="form-control mb-3" id="inputEmailAdm" name="email"
                                placeholder="Digite o e-mail" required>



                            <input type="password" class="form-control " id="inputSenhaAdm" name="senha"
                                placeholder="Digite a senha" required>

                            <div>

                                <h5 class="mt-2 text-danger">Selecione o nível de acesso </h5>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="acesso" id="admGeral"
                                        value="Administrador Geral" required>
                                    <label class="form-check-label" for="admGeral">
                                        Administrador geral
                                    </label>
                                </div>

                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="acesso" id="admComum"
                                        value="Administrador Comum">
                                    <label class="form-check-label" for="admComum">
                                        Administrador comum
                                    </label>
                                </div>


                            </div>

                            <div class="d-flex justify-content-end mt-2">
                                <button type="button" class="btn btn-secondary  me-3 btn-sm fechar-modal"
                                    data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" id="cad-usuario-btn" value="Cadastrar"
                                    class="bg-primary rounded-2">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="js/sweetalert2.js"></script>
    <script src="js/custom.js"></script>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>