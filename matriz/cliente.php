<?php
    // Fixa url
    $url = 'http://localhost/api/v1';

    // passa classe e metodo de forma fixa
    // pode ser dinâmico, utilize varivavel 
    $classe = 'estoque';
    $metodo = 'mostrar';

    // Monta URL
    $montar = $url.'/'.$classe.'/'.$metodo;

    // Obtem retorno da API
    $retorno = file_get_contents($montar);

    $retorno = json_decode($retorno, 1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz</title>
</head>
<body>
    <table>
        <thead>
            <td>Id</td>
            <td>Produto</td>
            <td>Preço</td>
        </thead>
        <?php
        foreach($retorno["dados"] as $dados){
            ?>
            <tr>
                <td><?= $dados["id"] ?></td>
                <td><?= $dados["produto"] ?></td>
                <td><?= $dados["preco"] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>