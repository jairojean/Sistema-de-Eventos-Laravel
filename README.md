
# Sistema simples de eventos 

Esse sistema foi feito durante o curso de Laravel 8  no youtube pelo Hora de codar.

## Começando

```
Criar um cópia do arquivo env.example para .env (Ambiente de Teste)
```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Nome-do-banco
DB_USERNAME=nome-usuario
DB_PASSWORD=sua-senha 

```
Depois de configurar o banco, no terminal rode o comando:  php artisan migrate
As tabelas serão criadas.
```
No terminal rode o comando: php artisan serve
```
no navegador acesse: http://localhost:8000 
```
Agora só criar o usuário e acessar o sistema.



## O sistema consiste em utilizar seguintes telas

* CRUD completo para o Evento
* Listagem com filtros.
* Restrição para acessar o sistema.
*Salvar 'items' do evento no formato JsoN.
 


