<?php

    include 'db.php';

    $sql = "SELECT * FROM clientes";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Telefone </th>
            <th> Ações </th>
        </tr>";

        while($row = $result -> fetch_assoc()) {

            echo "<tr>
                        <td> {$row['id']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['email']} </td>
                        <td> {$row['telefone']} </td>
                        <td>
                            <a href='update_clientes.php?id={$row['id']}'>Editar<a>
                            <a href='delete_clientes.php?id={$row['id']}'>Excluir<a>
                        </td>
                    </tr>
            ";
        };

        echo "</table>";

    }else{

        echo "Nenhum Registro encontrado.";

    };

    $conn -> close();

?>