# Create WordPress Posts from HTML Files

Este projeto fornece um script PHP que lê arquivos HTML numa pasta e cria POSTS no WordPress a partir desses arquivos. 
O script é útil quando é necessário importar conteúdo HTML existente para o WordPress, mantendo a data, título e conteúdo original.

## Requisitos

- PHP 8.1 ou superior
- Composer para gerenciar as dependências do projeto

## Instalação

1. Fazer clone deste repositório para a máquina local ou fazer o download dos arquivos.
2. Executar o composer para instalar as dependências:

```
composer install
```

## Configuração

1. Criar o .env com as seguintes configurações
```
WORDPRESS_URL="https://www.example.com/"
WORDPRESS_USERNAME="user"
WORDPRESS_PASSWORD="api-key"
HTML_FILES_PATH="/html-files-folder/"
```
2. Colocar os arquivos HTML que deseja importar para o WordPress na pasta `html-files-folder`.

## Utilização

1. Executar o script `Blog.php`

```
php src\Blog.php
```

O script irá iterar sobre cada arquivo HTML na pasta `html-files-folder` e enviar um HTTP POST para criar um artigo no WordPress com base nas informações do arquivo.

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir um Pull Request com melhorias, correções de bugs ou novos recursos.