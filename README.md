# structured-mvc-php-poo

Temos aqui uma Arquitetura MVC Estruturada com PHP, abaixo está toda a documentação para entendimento da arquitetura padrão que utilizei.

## Start da aplicação

1. Execute: baixe o repositório em sua máquina.
2. Agora você precisa ter o composer instalado para intepretar os command e gerenciar as dependências do PHP: https://getcomposer.org/download/.
3. Execute **composer update** para instalar as dependencias do projeto.
4. Se tiver usando xampp e windows pode coloca-la C:\xampp\htdocs\ *sua pasta aqui* ou git clone via terminal passando essa URL -> https://github.com/GuilhermeAlamino/structured-mvc-php-poo.git.
5. Usando seu terminal vá até a pasta do projeto e inicie o servidor passando pra qual pasta e arquivo quer que o PHP e qual porta começe a intrepetar : php -S localhost:5000 -t public.
6. Ligue o seu servidor de banco de dados no exemplo utilizei mysql.
7. Você precisa criar uma banco de dados, e uma tabela e tambem duas colunas 1 campo com id increments e outro campo especificando o nome da task vou deixar o caminho e um exemplo podera configurar:
```php
 <img src="/public/img/db.png>

Arquivo de configuração do banco de dados

\task-manager\App\DataBase

return new PDO("mysql:host=127.0.0.1;dbname=task-manager", 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);
```
8. A baixo está nossa arquitetura de pastas.
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
        1.9 img
        2.0 js
        }<br>
    }
        

Leia a baixo para mais detalhes 

## Observações


Projeto simples visando um to-do-list com 1 input contendo a tarefa, e podendo editar deletar e criar de forma dinâmica na mesma página com mesmo input :).

Ná pasta Database utilizei a pasta contendo seus respectivos arquivos e conteudos visando o Model ou seja cada conteudo contendo seus próprios arquivos de relacão com banco, para futuramente implementar ORM (Object Relational Mapper).

## Rotas

Trabalhando de forma bem simples a inicio, mas tratando rotas dinâmicas e rotas simples.
