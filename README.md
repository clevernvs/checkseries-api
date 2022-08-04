
# CheckSeries

Está é uma API para consumo do sistema CheckSeries.
O CheckSeries é um sistema para exibir informações sobre series, suas temporadas e seus episódios .

# Funcionalidades disponíveis

Atráves do uso desta API é possível: 

- Cadastrar uma série.
- Cadastrar suas temporadas.
- Cadastrar seus episódios por temporadas.
- Exibir todas as séries cadastradas.
- Exibir uma série especifica.
- Modificar informações sobre uma série especifica.
- Excluir uma série especifica.

# Tecnologias que foram utilizadas

<table>
    <thead>
        <tr><th>Tecnologia</th><th>Descrição</th></tr>
    </thead>
    <tbody>
        <tr><td>Laravel</td><td>Framework PHP para sistemas web utilizando o padrão MVC</td></tr>
        <tr><td>MySQL</td><td>Sistema de Gerenciamento de Banco de Dados Relacional</td></tr>
    </tbody>
</table>

# Como fazer a utilização deste projeto

Clone o repositório para o repositório local
~~~~
git clone https://github.com/clevernvs/checkseries-api.git
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
