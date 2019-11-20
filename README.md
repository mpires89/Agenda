# Agenda
API RESTful de uma agenda com as seguintes tecnologias PHP + LARAVEL.

+ Permitir cadastrar contato (nome, sobrenome, e-mail e telefone). 
+ Permitir cadastrar mensagem (contato (fk), descrição). 
+ Listar todas as mensagens por contato. 
+ Permitir alterar e excluir uma mensagem. 
+ Permitir alterar os dados de um contato. 
+ Validar os campos nos forms. 
+ Permitir excluir um contato. 

<h4>Baixa dependencias:</h4>
composer install

<h4>Rodar migrations:</h4>
php artisan migrate

<h4>Popular banco com uma massa de 10 cadastros:</h4>
php artisan db:seed

<h4>Subir aplicação</h4>
php artisan serve

<br>
<b>A aplicação estará disponivel no endereço<br>
 [http://localhost:8000/api/agenda](http://localhost:8000/api/agenda)
