<p align="center"><a href="https://m2center.com.br/" target="_blank"><img src="https://media-exp1.licdn.com/dms/image/C4D0BAQHWSzDi11zMow/company-logo_200_200/0/1630935747067?e=2147483647&v=beta&t=RijnyeQdeKKDXnNGFvVY6sFTMQ-1dVhMSwz_wLq5pjE" width="600"></a></p>

## Definição de Estruturas foi feita

- Docker/Compose.
- PHP 8.1.
- AngularJS.
- Banco Dados - PostgreSQL.
- Laravel 9x.
- DDD (driven domain design) - App\Domain

## Como Instalar - Passos a Passos

- 1 - Faça um clone nesse projeto - [git clone https://github.com/gustavossouza/testm2digital.git]
- 2 - Inicialize o docker utilizando nesse comando [docker-compose up -d --build] e aguarde...
- 3 - Agora iremos entrar dentro da imagem para usar terminal [docker exec -it m2digital sh] e aguarde...
- 4 - Agora iremos navegar até a pasta do projeto [cd /usr/share/nginx] e aguarde...
- 5 - Agora iremos instalar as bibliotecas(composer) [composer install] e aguarde...
- 6 - Agora iremos criar um arquivo de variaveis [cp .env-example .env] e aguarde...
- 7 - Agora iremos criar novas tabelas para Banco Dados [php artisan migrate] e aguarde...
- 8 - Agora iremos gerar uma nova key [php artisan key:generate] e aguarde...
- 9 - Agora iremos criar uma nova aba navegador favorito.. [http://localhost:8080]
- 10 - Prontinho!

## Rotas

- [http://localhost:8080/api/cities] - API Cidade
- [http://localhost:8080/api/groups] - API Grupos
- [http://localhost:8080/api/products] - API Produtos
- [http://localhost:8080/api/campaigns] - API Campanhas
- [http://localhost:8080/api/discounts] - API Descontos