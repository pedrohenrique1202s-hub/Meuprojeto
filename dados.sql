<<<<<<< HEAD
create table arvores (
=======
REATE TABLE IF NOT EXISTS arvores (
>>>>>>> c4879fd99692b45fd4c39117fb4a750d4484b79e
    id INT AUTO_INCREMENT PRIMARY KEY,
    especie_de_arvore VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    data_de_plantio DATE NOT NULL,
    data_de_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
<<<<<<< HEAD
); 
=======
);
>>>>>>> c4879fd99692b45fd4c39117fb4a750d4484b79e
