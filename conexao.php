
<?php

// 1. Configurações do banco de dados

$host = "127.0.0.1";
$user = "root";
$pass = "";
$base = "recife_verde";
$porta = 3307;


// 2. Conexão com o MySQL

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    $conn = new mysqli($host, $user, $pass, "", $porta);

    $conn->set_charset("utf8mb4");


    // 3. Criar o banco de dados, caso não exista

    $conn->query("CREATE DATABASE IF NOT EXISTS recife_verde");

    $conn->select_db($base);


    // 4. Criar a tabela, caso não exista

    $sql = "CREATE TABLE IF NOT EXISTS arvores (

        id INT AUTO_INCREMENT PRIMARY KEY,

        especie_de_arvore VARCHAR(100) NOT NULL,

        bairro VARCHAR(100) NOT NULL,

        rua VARCHAR(100) NOT NULL,

        estado VARCHAR(100) NOT NULL,

        data_de_plantio DATE NOT NULL,

        data_de_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    )";

    $conn->query($sql);


    // 5. Verificar se o formulário foi enviado

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Receber os dados enviados pelo HTML

        $especie = trim($_POST["especie"] ?? "");
        $bairro  = trim($_POST["bairro"] ?? "");
        $rua     = trim($_POST["rua"] ?? "");
        $estado  = trim($_POST["estado"] ?? "");
        $plantio = trim($_POST["data"] ?? "");


        // 6. Verificar se todos os campos foram preenchidos

        if (
            empty($especie) ||
            empty($bairro) ||
            empty($rua) ||
            empty($estado) ||
            empty($plantio)
        ) {

            die("Erro: preencha todos os campos do formulário.");

        }


        // 7. Verificar se a data está no formato correto

        $data = DateTime::createFromFormat("!Y-m-d", $plantio);

        if (!$data || $data->format("Y-m-d") !== $plantio) {

            die("Erro: data de plantio inválida.");

        }


        // 8. Preparar o comando para inserir os dados

        $stmt = $conn->prepare("

            INSERT INTO arvores

            (especie_de_arvore, bairro, rua, estado, data_de_plantio)

            VALUES (?, ?, ?, ?, ?)

        ");


        // 9. Associar os valores aos campos

        $stmt->bind_param(
            "sssss",
            $especie,
            $bairro,
            $rua,
            $estado,
            $plantio
        );


        // 10. Executar o cadastro

        $stmt->execute();


        // 11. Mostrar mensagem de sucesso

        echo "<script>
            alert('Árvore cadastrada com sucesso!');
            window.location.href = 'formulário.html';
        </script>";


        $stmt->close();

    } else {

        echo "Acesse esta página enviando o formulário.";

    }


    // 12. Encerrar conexão

    $conn->close();

} catch (mysqli_sql_exception $e) {

    die("Erro no banco de dados: " . htmlspecialchars($e->getMessage()));

}

?>
