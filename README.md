# Aplicação:
API RESTful desenvolvida em PHP 7.3, framework Laravel 7.3 e banco de dados mysql 5.7 que possui a finalidade de realizar transferência entre usuários.

## Requisitos: 
Necessário docker e docker-compose.

## Instalação 

###### Docker

Copie o conteúdo do arquivo .env.example, crie o .env e cole o conteúdo copiado;

No diretório phpdocker, execute o comando para rodar o docker através do docker-compose.yml e após libere o terminal: docker-compose up -d

Após, mas ainda no diretório phpdocker do projeto, acesse o container php-fpm: docker exec -it laravel-api-php-fpm /bin/bash e instale as dependências: composer install;

Após gerar as dependências, ainda no container, deve-se executar: php artisan key:generate;

Teste no seu navegador para verificar se a aplicação está UP: localhost:8080

###### Banco de Dados:
Para acessar o BD pelo seu client local é necessário entrar com o host: 172.0.0.1, user e password indicados no .env.example e porta 8082;

Para rodar as migrations, ainda no container do php-fpm, execute: php artisan migrate

Para popular o banco com as seeds: php artisan migrate

## Modelagem banco de dados:

![image](https://user-images.githubusercontent.com/38592846/119072860-9df7f880-b9c2-11eb-9e28-4bc43f5aafac.png)

## Teste da aplicação:

Para testar a aplicação a URL disponível é localhost:8080/api/transaction, e por se tratar de um POST é necessário informar um payload

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
  "message": "Transação autorizada",
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

Para a notificação é necessário entrar no container do php-fpm e rodar executar: php artisan queue:work. Isso fará com que a fila comece a processar, caso der certo terá registros na tabela de jobs e notifications. Caso contrário, após as tentativas informadas no Jobs ele irá inserir registros na failed_jobs.















