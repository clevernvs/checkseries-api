
# CheckSeries

Está é uma API para consumo do sistema CheckSeries, sistema este de consulta de séries da suas séries preferidas.

# Funcionalidades disponíveis

- Cadastrar uma série.
- Buscar por determinada série.
- Buscar por todas as séries.
- Modificar informações sobre a série.
- Excluir uma série.
- Cadastrar suas temporadas.
- Cadastrar seus episódios por temporadas.

# Tecnologias que foram utilizadas

- Laravel
- MySQL

# Como fazer a utilização deste projeto

Clone o repositório para o repositório local
~~~~
git clone <link_do_projeto>
~~~~

Crie o arquivo .env
~~~~
cp .env.example .env
~~~~

Suba os containers do projeto
~~~~
docker-compose up -d
~~~~

Acesse o container
~~~~
docker-compose exec app bash
~~~~

Instale as dependências do projeto
~~~~
composer install
~~~~

Gere a key do projeto
~~~~
php artisan key:generate
~~~~


Acesse o projeto
[http://localhost:8180](http://localhost:8180)

# Implementações Futuras

# Nosso(s) Colaborador(es)
- Desenvolvido por Cleverton Neves @clevernvs

# Status do projeto

Versão beta
