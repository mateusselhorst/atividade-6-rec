<?php

    include 'db.php';

    $sql = "SELECT * FROM tarefas";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0){
        echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Descricao </th>
            <th> Setor </th>
            <th> Prioridade </th>
            <th> Status </th>
            <th> Ações </th>
        </tr>";

        while($row = $result -> fetch_assoc()) {

            echo "<tr>
                        <td> {$row['id']} </td>
                        <td> {$row['descricao']} </td>
                        <td> {$row['setor']} </td>
                        <td> {$row['prioridade']} </td>
                        <td> {$row['status']} </td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Editar<a>
                            <a href='delete.php?id={$row['id']}'>Excluir<a>
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