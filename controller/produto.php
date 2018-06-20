<?php
namespace con;
class produto 
{
    public function load($args)
    {
        if($args['id'] != FALSE) {
        echo "você esta carregando o produto de numero:  ". $args['id'] . " e de nome: ". $args['nome'];
        } else {
            echo 'você esta carregando todos os produtos';
        }
    }
}