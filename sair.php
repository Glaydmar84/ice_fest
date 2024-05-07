<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['nome']);
$_SESSION['msg'] = "<h5 style='color: white; height: 5px; text-align:center '>Deslogado com sucesso!</5>";

header("Location: login.php");
