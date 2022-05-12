<p align="center"><a href="https://m2center.com.br/" target="_blank"><img src="https://media-exp1.licdn.com/dms/image/C4D0BAQHWSzDi11zMow/company-logo_200_200/0/1630935747067?e=2147483647&v=beta&t=RijnyeQdeKKDXnNGFvVY6sFTMQ-1dVhMSwz_wLq5pjE" width="600"></a></p>

## Definição de Estruturas foi feita

- Docker/Compose.
- PHP 8.1.
- AngularJS.
- Banco Dados - PostgreSQL.
- Laravel 9x.

## Como Instalar - Passos a Passos

- 1 - Faça um clone nesse projeto - [git clone https://github.com/gustavossouza/testm2digital.git]
- 2 - Inicialize o docker utilizando nesse comando [docker-compose up -d --build] e aguarde...
- 3 - Agora iremos instalar as bibliotecas(composer) [docker exec -it m2digital sh "cd /usr/share/nginx;composer install"] e aguarde...
- 4 - Agora iremos criar uma nova aba navegador favorito.. [https://localhost:8080]
- 5 - Prontinho!

## Rotas

- [https://localhost:8080/api/cities] - API Cidade
- [https://localhost:8080/api/groups] - API Grupos
- [https://localhost:8080/api/products] - API Produtos
- [https://localhost:8080/api/campaigns] - API Campanhas
- [https://localhost:8080/api/discounts] - API Descontos