<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['create']))) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $status = $_POST['status'];

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

    if ($conn->query($sql) === true) {
        echo "Novo registro no Banco!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    };
    $conn->close();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>

<body>

<h1>Clientes</h1>

    <div id="tabela-de-consulta">

        <?php

        include 'read_clientes.php';

        ?>

<h2>Produtos</h2>

        <?php
        
        include 'read_produtos_usuario.php';

        ?>

        <h3>Pedidos</h3>

        <?php
        
        include 'read_produtos_usuario.php';

        ?>

    </div><br>

        <a href="index.php"><button>Voltar para o início</button></a>

</body>

</html>