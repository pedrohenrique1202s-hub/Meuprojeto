php
<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$base = "recife_verde";
$porta = 3307;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, "", $porta);
    $conn->set_charset("utf8mb4");

    $conn->query("CREATE DATABASE IF NOT EXISTS recife_verde");
    $conn->select_db($base);

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $especie = trim($_POST["especie"] ?? "");
        $bairro  = trim($_POST["bairro"] ?? "");
        $rua     = trim($_POST["rua"] ?? "");
        $estado  = trim($_POST["estado"] ?? "");
        $plantio = trim($_POST["data"] ?? "");

        if (empty($especie) || empty($bairro) || empty($rua) || empty($estado) || empty($plantio)) {
            die("Erro: preencha todos os campos do formulário.");
        }

        $data = DateTime::createFromFormat("!Y-m-d", $plantio);
        if (!$data || $data->format("Y-m-d") !== $plantio) {
            die("Erro: data de plantio inválida.");
        }

        $stmt = $conn->prepare("
            INSERT INTO arvores
            (especie_de_arvore, bairro, rua, estado, data_de_plantio)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param("sssss", $especie, $bairro, $rua, $estado, $plantio);
        $stmt->execute();

        echo "<script>
            alert('Árvore cadastrada com sucesso!');
            window.location.href = 'formulario.html';
        </script>";

        $stmt->close();
        $conn->close();
        exit();
    }

} catch (mysqli_sql_exception $e) {
    die("Erro no banco de dados: " . htmlspecialchars($e->getMessage()));
}
?>