create database Biblioteca;
use Biblioteca;

     create table tbClientes(
         cpfCliente          varchar(15),
         nomeCliente         varchar(50),
         emailCliente        varchar(30),
         celularCliente      varchar(14),
         enderecoCliente     varchar(50),
         primary KEY (cpfCliente)
     );
      create table tbLivros(
          isbnLivro          varchar(13),
          nomeLivro          varchar(40),
          autorLivro         varchar(30),
          editoraLivro       varchar(25),
          edicaoLivro        varchar(15),
          PRIMARY KEY (isbnLivro)
      );


      create table tbEmprestimo(
                     idEmprestimo        int auto_increment,
                     idCliente           varchar(15),
                     idLivro             varchar(13),    
                     dtEmprestimo        datetime,
                     dtDevolucao         datetime,
     PRIMARY KEY     (idEmprestimo),
	 CONSTRAINT idCliente FOREIGN KEY (idCliente) REFERENCES tbClientes (cpfCliente),
	 CONSTRAINT idLivro FOREIGN KEY (idLivro) REFERENCES tbLivros (isbnLivro)
      );


     