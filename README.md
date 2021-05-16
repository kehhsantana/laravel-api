## Objetivo:
APIRESTFul com framework Laravel 7.3 e PHP 7.3, com finalidade de realizar transações entre usuários. 

## Requisitos: 

Necessário docker e docker-compose.

## Instalação: 

Copie o conteúdo do arquivo .env.example, crie o .env e cole o conteúdo copiado;

No diretório, execute o comando para rodar o docker através do docker-compose.yml 
e liberar o terminal: Docker-compose up -d;

Acessar o container php-fpm: docker exec -it php-fpm ;

Instalar as dependências: composer install;

Geração da chave na raiz do projeto: php artisan key:generate

Agora você pode acessar o localhost:8000 no seu navegador. 



