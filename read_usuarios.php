<?php

    include 'db.php';

    $sql = "SELECT * FROM usuarios";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
        </tr>";

        while($row = $result -> fetch_assoc()) {

            echo "<tr>
                        <td> {$row['id']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['email']} </td>
                        <td>
                            <a href='update_usuarios.php?id={$row['id']}'>Editar<a>
                            <a href='delete_usuarios.php?id={$row['id']}'>Excluir<a>
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