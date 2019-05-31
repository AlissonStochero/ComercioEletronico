/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  labinf
 * Created: 31/05/2019
 */

create table tipo_mov(
	id_tipo_mov int primary key auto_increment,
    descr_tipo_mov varchar(800)
);

create table tipo_mov_est(
	id_tipo_mov_est int primary key auto_increment,
    descr_tipo_mov_est varchar(800),
    indica_entrada enum('sim','nao'),
    indica_saida enum('sim','nao')
);

create table produto(
	id_produto int primary key auto_increment,
    desc_produto varchar(500),
    vl_custo numeric(10,2),
    vl_venda numeric(10,2),
    vl_custo_final numeric(10,2),
    qtde_atual numeric(10,2),
    qtde_min numeric(10,2), 
    cod_barra numeric(10,2)
);

create table movimento(
	id_movimento int primary key auto_increment,
    dt_movimento date,
    dt_validade date,
    id_cliente int,
    id_tipo_mov int,
    id_tipo_mov_est int,
    foreign key (id_cliente) references cliente(id_cliente),
    foreign key (id_tipo_mov) references tipo_mov(id_tipo_mov),
    foreign key (id_tipo_mov_est) references tipo_mov_est(id_tipo_mov_est)
);

create table itens_mov(
	id_item_mov int primary key auto_increment,
    vl_venda numeric(10,2),
    qtde numeric (10,2),
    id_movimento int,
    id_produto int,
	foreign key (id_movimento) references movimento(id_movimento),
    foreign key (id_produto) references produto(id_produto)
);

create table movimento_fiscal(
	id_movimento_fiscal int primary key auto_increment,
    nro_nota_fiscal numeric(10,0),
    arq_xml varchar(200),
    arq_pdf varchar(200),
    id_movimento int,
    id_tipo_mov int,
    id_tipo_mov_est int,
    foreign key (id_movimento) references movimento(id_movimento),
    foreign key (id_tipo_mov) references tipo_mov(id_tipo_mov),
	foreign key (id_tipo_mov_est) references tipo_mov_est(id_tipo_mov_est)
);

create table itens_mov_fisc(
	id_item_mov_fisc int primary key auto_increment,
    id_mov_fisc int,
    foreign key (id_mov_fisc) references movimento_fiscal(id_movimento_fiscal)
);

create table cliente(
	id_cliente int primary key auto_increment,
    nome varchar(100),
    cpf numeric(12,0),
    endereco varchar(100),
    email varchar(100),
    fone1 numeric(12,0),
    fone2 numeric(12,0)
);

create table forma_envio(
	id_forma_env int primary key auto_increment,
    desc_forma_env varchar(200)
);

create table carrinho(
	id_carrinho int primary key auto_increment,
    id_cliente int,
    id_forma_env int,
    foreign key (id_cliente) references cliente(id_cliente),
    foreign key (id_forma_env) references forma_envio(id_forma_env)
);

create table itens_carrinho(
	id_item_carr int primary key auto_increment,
    qtde numeric(10,2),
    id_produto int,
    id_carrinho int,
    foreign key (id_produto) references produto(id_produto),
    foreign key (id_carrinho) references carrinho(id_carrinho)
);
