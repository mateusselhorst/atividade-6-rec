<?php

include 'db.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Preco </th>
            <th> Quantidade </th>
            <th> Ações </th>
        </tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                        <td> {$row['id']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['preco']} </td>
                        <td> {$row['quantidade']} </td>
                        <td> <a href='update_produtos.php?id={$row['id']}'>Editar</a> 
                        <a href='delete_produtos.php?id={$row['id']}'>Deletar</a> </td>
                    </tr>
            ";
    };

    echo "</table>";
} else {

    echo "Nenhum Registro encontrado.";
};

$conn->close();
