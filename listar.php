<?php

require_once "conexao.php";


$sql = "SELECT * FROM arvores";
$stmt = $pdo->query($sql);


$arvores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Árvores Cadastradas - Recife Verde</title>
</head>
<body>
    <h1>Árvores Cadastradas</h1>

    
    <?php foreach ($arvores as $arvore): ?>
        <p>
            <strong>Espécie:</strong> <?= $arvore['especie_de_arvore'] ?> |
            <strong>Bairro:</strong> <?= $arvore['bairro'] ?> |
            <strong>Rua:</strong> <?= $arvore['rua'] ?> |
            <strong>Estado:</strong> <?= $arvore['estado'] ?> |
            <strong>Plantio:</strong> <?= $arvore['data_de_plantio'] ?>
        </p>
        <hr>
    <?php endforeach; ?>

</body>
</html>