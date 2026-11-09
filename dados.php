<?php
include("conexao.php");

$sql = "SELECT * FROM arvores";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Projeto - Recife Verde</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container-dados {
            padding: 40px;
            font-family: Arial, sans-serif;
        }
        .tabela-dados { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        .tabela-dados th, .tabela-dados td { 
            border: 1px solid #ddd; 
            padding: 12px; 
            text-align: left; 
        }
        .tabela-dados th { 
            background-color: #2e7d32; 
            color: white; 
        }
        .tabela-dados tr:nth-child(even) { 
            background-color: #f9f9f9; 
        }
        .btn-voltar {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="container-dados">
        <a href="index.html" class="btn-voltar">← Voltar ao Início</a>
        
        <h2>Árvores Cadastradas - Recife Verde</h2>

        <?php
        if ($resultado && $resultado->num_rows > 0) {
            echo "<table class='tabela-dados'>";
            echo "<tr>
                    <th>ID</th>
                    <th>Espécie da Árvore</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Estado</th>
                    <th>Data de Plantio</th>
                    <th>Data de Cadastro</th>
                  </tr>"; 
            
            while($linha = $resultado->fetch_assoc()) {
                $data_plantio_formatada = date("d/m/Y", strtotime($linha["data_de_plantio"]));
                $data_cadastro_formatada = date("d/m/Y H:i", strtotime($linha["data_de_cadastro"]));

                echo "<tr>";
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["especie_de_arvore"] . "</td>"; 
                echo "<td>" . $linha["bairro"] . "</td>"; 
                echo "<td>" . $linha["rua"] . "</td>"; 
                echo "<td>" . $linha["estado"] . "</td>"; 
                echo "<td>" . $data_plantio_formatada . "</td>"; 
                echo "<td>" . $data_cadastro_formatada . "</td>"; 
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='margin-top: 20px; color: #666;'>Nenhuma árvore encontrada ou banco de dados vazio.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>