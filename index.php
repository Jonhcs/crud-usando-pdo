<?php

require 'Conn.php';
require 'IProduto.php';
require 'produto.php';
require 'Service.php';

$db = new Conn('localhost','projeto_01','jhonatan','root');
$produto = new Produto;

// $produto->setId(1)
//         ->setName('Produto1')
//         ->setDesc("Descrição de um produto");

$service = new Service($db,$produto);

// var_dump($service->list());
// ar_dump($service->save());
// ar_dump($service->update());
// ar_dump($service->delete(2));
// ar_dump($service->find(2));