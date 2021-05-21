# Aplicação:
API RESTful desenvolvida em PHP 7.3, framework Laravel 7.3 e banco de dados mysql 5.7 que possui a finalidade de realizar transferências entre usuários.

## Requisitos: 
Necessário docker e docker-compose.

## Instalação 

Copie o conteúdo do arquivo .env.example, crie o .env e cole o conteúdo.

###### Docker

No diretório phpdocker, execute o comando para rodar o docker através do docker-compose.yml e após libere o terminal:

> docker-compose up -d

Ainda no diretório phpdocker do projeto, acesse o container php-fpm:

> docker exec -it laravel-api-php-fpm /bin/bash 

Instale as dependências:

> composer install

Após gerar as dependências, ainda no container, execute: 

> php artisan key:generate

Teste no seu navegador para verificar se a aplicação está UP: 

> localhost:8080

###### Banco de Dados:
Para acessar o BD pelo seu client local:

Acesse o container do mysql: 
> docker exec -it laravel-api-mysql /bin/bash 

Execute:

> docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' laravel-api-mysql

Ele irá te retornar o IP para utilizar como host. Já o user, password e portas estão indicados no .env.example. Caso a porta der negativa, por favor tentar a 8082. 

Acesse novamente o container do php-fpm:

>  docker exec -it laravel-api-php-fpm /bin/bash 

Rode as migrations:

> php artisan migrate

Popule o banco com as seeds: 

> php artisan db:seed

## Modelagem banco de dados:

![image](https://user-images.githubusercontent.com/38592846/119072860-9df7f880-b9c2-11eb-9e28-4bc43f5aafac.png)

## Teste da aplicação:

Para testar a aplicação a URL disponibilizada é:

> localhost:8080/api/transaction

No header deve-se adicionar: 

> New header: Accept 
> Value: application/json

###### Exemplo - Payload: 

```json
{
	"payer_user_id":"1",
	"payee_user_id":"3",
	"value":200.00
}
```

###### Exemplo - Resposta: 

```json
{
  "message": "Transação concluída",
  "transaction": {
    "id": 1,
    "payer_user_id": 1,
    "payee_user_id": 3,
    "value": "200",
    "transaction_status_id": 2
  }
}

```

###### Notificação: 

Para a notificação é necessário entrar no container do php-fpm:

> docker exec -it laravel-api-php-fpm /bin/bash

Execute: 

> php artisan queue:work

Isso fará com que a fila comece a processar e caso der certo terá registros na tabela de jobs e notifications. Caso contrário, após as tentativas informadas no Jobs ele irá inserir registros na failed_jobs.















