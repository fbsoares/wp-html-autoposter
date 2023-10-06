<?php namespace Fbsoares\WpHtmlAutoposter;

require 'vendor/autoload.php';
$config = require 'config.php';

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

// Pasta com os arquivos HTML


// Criar cliente Guzzle
$client = new Client([
    'base_uri' => $config['wordpressUrl'],
    'timeout' => 30,
    'headers' => [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ],
    'auth' => [$config['username'], $config['password']],
]);

// Obter lista de arquivos HTML na pasta
$files = glob($config['folder'] . '/*.html');
// Loop através dos arquivos
foreach ($files as $file) {
    // Nome do arquivo sem a extensão
    $fileName = pathinfo($file, PATHINFO_FILENAME);

    print($fileName."\n");
    // Data e título do post
    preg_match('/(\d{4}-\d{2}-\d{2})_(.*)/', $fileName, $matches);
    if (count($matches) !== 3) {
        continue;
    }

    $date = $matches[1];
    $title = $matches[2];

    // Conteúdo do post
    $content = file_get_contents($file);

    // Dados do post
    $data = [
        'date' => $date."T00:00:00",
        'title' => str_replace("-"," ",$title),
        'content' => $content,
        'status' => 'draft',
    ];    

    // Enviar requisição POST para criar o post
    try {
        $response = $client->post('/mediablog/wp-json/wp/v2/posts', [
            'json' => $data,
        ]);

        $statusCode = $response->getStatusCode();
        if ($statusCode === 201) {
            echo "Post criado com sucesso: $title\n";
        }
    } catch (RequestException $e) {
        var_dump($e);
        echo "Erro ao criar o post: " . $e->getMessage() . "\n";
    }
}