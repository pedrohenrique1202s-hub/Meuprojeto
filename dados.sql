create table arvore{
    id int auto_incrment primary key,
    especie_de_arvore varchar(100) not null,
    bairro varchar(100) not null,
    rua varchar(100) not null,
    etado varchar(100) not null,
    data_de_pantio date not null;
    data_de_cadatro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

}