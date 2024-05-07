<?php
session_start();

include_once 'config/conexao.php';

// Verificar se o usuário já está autenticado
if (isset($_SESSION['tipo_admin'])) {
    $tipoAdmin = $_SESSION['tipo_admin'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>

</head>

<body class="body">

    <div class="container mb-5">
        <div class="row ">
            <div class="col-4 image-container">
                <img src="./img/acaicomfrutas.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-4 form mb-2">
                <h1 class="text-center">Ice Fest</h1>
                <h1 class="text-center">Açaí</h1>
                <div class="login mx-3">

                    <h2>Login</h2>

                    <?php


                    if (isset($_SESSION['msg'])) {
                        echo '<div id="alertMsg" class="alert alert-success bg-success" role="alert">' . $_SESSION['msg'] . '</div>';
                        unset($_SESSION['msg']);
                    } elseif (isset($_SESSION['msg_error'])) {
                        echo '<div id="alertMsg" class="alert alert-danger bg-danger text-light" role="alert">' . $_SESSION['msg_error'] . '</div>';
                        unset($_SESSION['msg_error']);
                    }
                    ?>

                    <script>
                        // Código JavaScript para fechar o alerta após 3 segundos
                        setTimeout(function () {
                            document.getElementById('alertMsg').style.display = 'none';
                        }, 5000);
                    </script>

                    <?php



   if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $dados = [
                            'email' => $_POST['email'],
                            'senha' => $_POST['senha']
                        ];

                        $adm = "SELECT idadm, nome, email, senha,tipo_admin 
                                FROM adm
                                WHERE email = :email
                                LIMIT 1";

                        $result_adm = $conn->prepare($adm);
                        $result_adm->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                        $result_adm->execute();

                        if ($result_adm && $result_adm->rowCount() != 0) {
                            $row_adm = $result_adm->fetch(PDO::FETCH_ASSOC);

                            if (password_verify($dados['senha'], $row_adm['senha'])) {
                                $_SESSION['id'] = $row_adm['idadm'];
                                $_SESSION['nome'] = $row_adm['nome'];
                                $_SESSION['email'] = $row_adm['email']; // Adicione o email à sessão se necessário
                                $_SESSION['tipo_admin'] = $row_adm['tipo_admin'];

                                // Redirecione para a página desejada após o login
                                header('location: lading.php');
                                exit();
                            } else {
                                $_SESSION['msg_erro'] =  '<div class="alert alert-danger bg-danger" id="msg_erro" role="alert">
                                <h5 style= "height:10px"; class="text-light  ">Senha ou usuário incorretos</h5>
                               </div>';
                            }
                        } else {
                            $_SESSION['msg_erro'] = '<div class="alert alert-danger bg-danger" id="msg_erro" role="alert">
                            <h5 style= "height:10px"; class="text-light  ">Senha ou usuário incorretos</h5>
                           </div>';
                        }
                    }

                    if (isset($_SESSION['msg_erro'])) {
                        echo $_SESSION['msg_erro'];
                        unset($_SESSION['msg_erro']);


                    }


                    ?>

                    <script>
                        // Código JavaScript para fechar o alerta após 3 segundos
                        setTimeout(function () {
                            document.getElementById('msg_erro').style.display = 'none';
                        }, 5000);
                    </script>

                    <form action="login.php" method="POST">
                        <label> e-mail</label>
                        <input type="email" name="email" placeholder="Digite seu email" required>
                        <label> Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" required>
                        <button type="submit" name="login">Login</button>
                        <a href="#" class="forget">esqueceu sua senha ?</a>

                    </form>
                </div>
            </div>


            <div class="col-4 image-container">
                <img src="./img/assaiTropical.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>