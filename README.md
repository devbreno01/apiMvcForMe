
# MVC PHP PURO(API)
Objetivo aqui é criar uma API em php utilizando boas praticas e arquitetura MVC



## OBJETIVO

- Recurso para fácil implementção em seu projeto sem começar do zero


- Facilitar minha vida e a sua 

## REQUISITOS

- PHP 7.3+
- Apache Server
- Mysql
- Composer
- Nesse caso eu utilizei WampServer

## Instalação

Você pode clonar o repositório e uma pasta localmente
- Rode esse comando para que as classes sejam carregadas automaticamente

```bash
  composer dump-autoload

```
Após isso, dentro de config/database.php você pode configurar as informações de acordo com seu banco de dados
## Explicação

Nesse exemplo crio uma Model Users onde  contem os queries de criar, vizualizar, excluir e deletar e efetua na tabela users do banco de dados   \**

Utilizo essa model na UserController e a mágica é feita

Todo o projeto começa com o index.php. 
- Nele eu chamo minhas rotas e meus autoloads
```bash
  <?php

        require_once __DIR__ . '/vendor/autoload.php';
        require_once __DIR__ . '/routes/web.php';
```
As rotas
```bash
  GET '/' or ''
```
- Me retorna um JSON com os Users cadastrados no banco de dados
- Utiliza a UserController com o metodo index() para me retornar esses dados 

```bash
  POST '/users'
```
- Utiliza a UserController com o método store() para criar um usuário

## COISAS PARA PRESTAR ATENÇÃO(POSSIVEIS ERROS)
- Sempre esteja atento(a) a web.php, pois é lá onde a URL pode não está sendo encontrada ou ocorrendo algum erro 
- Esteja atento(a) a suas Models, nelas PDO e suas consultas podem frequentemente dar erros 
- No postman, utilize 'form-data' para enviar as requisições