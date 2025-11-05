<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['create']))) {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome', '$preco')";

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
    <title>Create pedidos</title>
</head>

<body>

<h1>Pedidos</h1>

    <div id="tabela-de-consulta">

        <?php

        include 'read_produtos_cliente.php';

        ?>

    </div><br>

        <a href="create_produtos.php"><button>Fazer novo pedido</button></a><br><br>  

        <a href="index.php"><button>Voltar para o início</button></a>

</body>

</html>