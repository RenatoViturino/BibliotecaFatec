create database Biblioteca 
use Biblioteca

     create table tbClientes(
         idCliente           int auto_increment,
         nomeCliente         varchar(50),
         cpfCliente          varchar(15),
         emailCliente        varchar(30),
         celularCliente      varchar(14),
         enderecoCliente     varchar(50),
         primary KEY (idCliente) 
     )
      create table tbLivros(
          idLivro            int auto_increment,
          nomeLivro          varchar(40),
          autorLivro         varchar(30),
          editoraLivro       varchar(25),
          edicaoLivro        varchar(15),
          isbnLivro          varchar(13),
          PRIMARY KEY (idLivro)
      )


      create table tbEmprestimo(
                     idEmprestimo        int auto_increment,
                     idCliente           int,
                     idLivro             int,    
                     dtEmprestimo        datetime,
                     dtDevolucao         datetime,
     PRIMARY KEY     (idEmprestimo)
      )
      ALTER TABLE `tbEmprestimo`
                     ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `tbclientes` (`idCliente`),
                     ADD CONSTRAINT `idLivro` FOREIGN KEY (`idLivro`) REFERENCES `tblivros` (`idLivro`);

      create Procedure procInserirClientes(
         
         nome_Cliente         varchar(50),
         cpf_Cliente          varchar(15),
         email_Cliente        varchar(30),
         celular_Cliente      varchar(14),
         endereco_Cliente     varchar(50)      
          )
INSERT into tbClientes  (
                                        nomeCliente ,
                                        cpfCliente   ,
                                        emailCliente  ,
                                        celularCliente ,
                                        enderecoCliente
                                     )
                       
                       VALUES(
                                         nome_Cliente,    
                                         cpf_Cliente ,   
                                         email_Cliente,   
                                         celular_Cliente, 
                                         endereco_Cliente
                       			 )

  create procedure procInserirLivros(
           
            nome_Livro       varchar(30),
            nome_Autor       varchar(14),
            editora_Livro    varchar(40),
            edicao_Livro     varchar(25),
            isbn_Livro      varchar(25)
        )

     

            INSERT into tbLivros  (
                                       nomeLivro  , 
                                       nomeLivro  ,
                                       autorLivro,
                                       editoraLivro     ,
                                       edicaoLivro  ,
                                        isbnLivro
                                     )  
                        VALUES(
                                        nome_Livro ,    
                                        nome_Autor   ,  
                                        editora_Livro , 
                                        edicao_Livro   ,
                                        isbn_Livro     
                        )

            
      create PROCEDURE procListarClientes( 
                                           nome_Cliente         varchar(50),
                                           cpf_Cliente          varchar(15),
                                           email_Cliente        varchar(30),
                                           celular_Cliente      varchar(14),
                                           endereco_Cliente     varchar(50)      
          )
      
                                Select  nomeCliente ,
                                        cpfCliente   ,
                                        emailCliente  ,
                                        celularCliente ,
                                        enderecoCliente
               From tbClientes
                               WHERE 
                                     nome_Cliente    = nomeCliente and 
                                     cpf_Cliente     = cpfCliente and 
                                     email_Cliente   = emailCliente and
                                     celular_cliente = celularCliente and 
                                     endereco_Cliente = enderecoCliente

        
      )

      create PROCEDURE procListarLivros( nome_Livro       varchar(30),
                                         nome_Autor       varchar(14),
                                         editora_Livro    varchar(40),
                                         edicao_Livro     varchar(25),
                                         isbn_Livro      varchar(25)
      )
                                SELECT  nomeLivro ,    
                                        nomeAutor   ,  
                                        editoraLivro , 
                                        edicaoLivro   ,
                                        isbnLivro     
                                        
                   FROM tbLivros

                                WHERE
                                        nome_Livro = nomeLivro and 
                                        nome_Autor = nomeAutor and 
                                        editora_Livro = editoraLivro AND
                                        edicao_Livro = edicaoLivro AND
                                        isbn_Livro = isbnLivro
      
      

      create procedure procListarEmprestimo(
                                              id_Cliente           int,
                                              id_Livro             int,    
                                              dt_Emprestimo        datetime,
                                              dt_Devolucao         datetime,
      )
              SELECT 
                      idCliente    ,
                      idLivro      ,
                      dtEmprestimo ,
                      dtDevolucao  
                      
             FROM tbEmprestimo

                  WHERE 
                          idCliente = id_Cliente AND
                          idLivro = idLivro and
                          dtEmprestimo   = dt_Emprestimo AND
                          dtDevolucao = dt_Devolucao 

      
   

      create PROCEDURE procDeletarCliente( id_Cliente int)
       DELETE from tbClientes WHERE idCliente = id_Cliente

       create PROCEDURE procDeletarLivro(
       id_Livro int 
       )
              DELETE from tbLivros WHERE idLivro = id_Livro
       
   

        create PROCEDURE procListarEmprestimoCliente(
         nome_Cliente varchar(30),
          nome_Livro   varchar(40)
        )
      
                Select nomeCliente,nomeLivro from tbClientes JOIN tbLivros 
                ON nomeCliente= nome_Cliente AND nomeLivro = nome_Livro
       
     