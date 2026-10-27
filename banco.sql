create table regiao (
    id int auto_increment primary key,
    bairro varchar(100) not null,
    zona varchar(50) not null
);

create table arvore(
    id int auto_increment primary key,
    id_regiao int not null,
     nome_popular varchar(100) not null,
    especie varchar(100) not null,
    rua varchar(150) not null,
    data_de_plantio date not null,
     foreign key (id_regiao) references regiao(id)
);
