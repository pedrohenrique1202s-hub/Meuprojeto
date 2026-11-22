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
    <link rel="stylesheet" href="php.css">
</head>
<body>
    <div class="container">
        <a href="index.html" >← Voltar ao Início</a>

        <h2>Árvores Cadastradas - Recife Verde</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Espécie da Árvore</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Estado</th>
                    <th>Data de Plantio</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arvores as $arvore): ?>
                    <tr>
                        <td><?= $arvore['id'] ?? '' ?></td>
                        <td><?= $arvore['especie_de_arvore'] ?></td>
                        <td><?= $arvore['bairro'] ?></td>
                        <td><?= $arvore['rua'] ?></td>
                        <td><?= $arvore['estado'] ?></td>
                        <td><?= date('d/m/Y', strtotime($arvore['data_de_plantio'])) ?></td>
                        <td><?= $arvore['data_de_cadastro'] ?? 'Coluna não existe no banco' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>