<?php
require_once "conexao.php";

$especie = $_POST["especie"];
$bairro = $_POST["bairro"];
$rua= $_POST["rua"];
$estado = $_POST["estado"];
$data = $_POST["data"];


try {
    $sql = "INSERT INTO arvores (especie_de_arvore, bairro, rua, estado, data_de_plantio) VALUES (:especie, :bairro, :rua, :estado, :data)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":especie" => $especie,
        ":bairro"  => $bairro,
        ":rua"     => $rua,
        ":estado"  => $estado,
        ":data"    => $data
    ]);
    echo "Cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}






















?>