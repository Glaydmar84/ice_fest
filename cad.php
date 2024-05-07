<?php

session_start();

include_once 'config/conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$tipoAdmin = filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING);

// Verificar se o e-mail já está cadastrado
$verificaEmail = $conn->prepare("SELECT idadm FROM adm WHERE email = :email LIMIT 1");
$verificaEmail->bindParam(':email', $email, PDO::PARAM_STR);
$verificaEmail->execute();

// Verificar se o nome já está cadastrado
$verificaNome = $conn->prepare("SELECT idadm FROM adm WHERE nome = :nome LIMIT 1");
$verificaNome->bindParam(':nome', $nome, PDO::PARAM_STR);
$verificaNome->execute();

$minCaracteresSenha = 4;
$maxCaracteresSenha = 4;


$tamanhoSenha = strlen($senha);

if ($tamanhoSenha < $minCaracteresSenha || $tamanhoSenha > $maxCaracteresSenha) {
    $response = [
        'status' => true,
        'msgsenha' => "A senha deve ter $minCaracteresSenha caracteres."
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}




if ($verificaNome->rowCount() > 0 || $verificaEmail->rowCount() > 0) {
    $response = [
        'status' => true,
        'msgerror' => 'Nome ou email já cadastrado'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}



$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {
    $conn->beginTransaction();

    $stmt = $conn->prepare("INSERT INTO adm (nome, email, senha, tipo_admin) VALUES (:nome, :email, :senha, :tipo_admin)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senhaHash);
    $stmt->bindParam(':tipo_admin', $tipoAdmin);
    $stmt->execute();

   

    $conn->commit();

   

    $response = [
        'status' => false,
        'msgsuccess' => 'Usuário cadastrado com sucesso'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);

} catch (Exception $e) {
    $conn->rollBack();

    $response = [
        'status' => false,
        'msg' => 'Erro ao cadastrar usuário.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}

