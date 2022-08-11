# Cakephp 4 Template
CMS and API

## Installation

1. Download and install [Composer](https://getcomposer.org/doc/00-intro.md).

2. Download and install [GIT](https://git-scm.com/downloads).

3. Project Clone
```bash
git clone https://gitlab.com/DionataNunesGarcia/laticineos.git
```

Update project dependence using composer
```bash
composer install
```

## Config database

Read and edit `config/app.php` with connection data.
If environment is local, copy `config/app_local.example.php` and rename to `config/app_local.php`, after config connections data.

To update scripts database, is used the [migrations](https://book.cakephp.org/migrations/2/pt/index.html#migrations), para saber mais só entrar no link https://book.cakephp.org/migrations/2/pt/index.html#migrations

## Local Server
To deploy local machine, execute the command
```bash
bin/cake server -p 8765
```

## Server Update
Para atualizar os dados no servidor, só executar o comando pull do git apontando para a branch main dentro da raiz do projeto `var/www/html/`

```bash
git pull origin main
```

To check if exist scripts

```bash
bin/cake migrations status
```

To execute all migrations scripts, execute command

```bash
bin/cake migrations migrate
```

To cache clear

```bash
bin/cake cache clear_all
```
