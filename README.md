# php-task-manager-docker

Temos aqui uma Arquitetura MVC Estruturada com PHP e com Docker, abaixo está toda a documentação para entendimento da arquitetura padrão que utilizei.

## Start da aplicação

1. Baixe o repositório em sua máquina.
2. Agora você precisa ter o composer instalado para intepretar os command e gerenciar as dependências do PHP: https://getcomposer.org/download/.
3. Execute **composer update** ou **composer install** para instalar as dependencias do projeto.
4. Você precisa ter o docker baixe aqui : https://www.docker.com/.
5. Se tiver usando xampp e windows pode coloca-la C:\xampp\htdocs\ *sua pasta aqui* ou git clone via terminal passando essa URL -> https://github.com/GuilhermeAlamino/php-task-manager-docker.git.
6. Usando seu terminal vá até a pasta do projeto e inicie os Containers para simplificar a execução do projeto sendo assim ele vai iniciar os serviços que precisam ser executados e criar o banco com as tabelas e colunas necessarias: 

Primeiro se estiver executando algum container neste projeto, precisa interromper e remover todos como o comando abaixo

```php

docker-compose down

```
7. Agora pode subir os containers com o comando abaixo.

Com esse comando você estara iniciando todos os serviços do docker-compose.yml o "-d" executa ele em segundo plano ou seja background.

```php

docker-compose up -d

```

8. Arquivo de configuração do banco de dados

```php
App\DataBase\Connect

return new PDO("mysql:host=127.0.0.1;dbname=task-manager", 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);
  
```
9. A baixo está nossa arquitetura de pastas.
    1. App {<br>
        1.1 Controllers<br>
        1.2 Core<br>
        1.3 DataBase<br>
        1.4 Helpers<br>
        1.5 Router<br>
        1.6 Views<br>
    }
    2. Public {<br>
        1.7 assets<br>{
        1.8 css<br>
        1.9 img<br>
        2.0 js<br>
        }<br>
    }
        

Leia a baixo para mais detalhes 

## Observações


Projeto simples visando um to-do-list com 1 input contendo a tarefa, e podendo editar, deletar e criar de forma dinâmica na mesma página com mesmo input :).

Ná pasta Database utilizei a pasta contendo seus respectivos arquivos e conteudos visando o Model ou seja cada conteudo contendo seus próprios arquivos de relacão com banco, para futuramente implementar ORM (Object Relational Mapper).

## Rotas

Trabalhando de forma bem simples a inicio, mas tratando rotas dinâmicas e rotas simples.
