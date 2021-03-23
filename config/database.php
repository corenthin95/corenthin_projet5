<?php

namespace App\config;

/**
 * Return connection to the database
 * 
 * @return PDO
 */
function getPdo()
{
    $pdo = new PDO('mysql:dbname=corenthin_projet5;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

