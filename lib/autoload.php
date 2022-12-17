<?php

session_start();

const ALIASES = [
    'Plugo' => 'lib',
    'App' => 'src',
];

spl_autoload_register(function(string $class): void {
    $namespacePart = explode('\\', $class);
    if(in_array($namespacePart[0], array_keys(ALIASES))){
        $namespacePart[0] = ALIASES[$namespacePart[0]];
    }else{
        throw new Exception('Namespace << ' . $namespacePart[0] . ' >> invalide. Un namespace doit commencer par : <<Plugo>> ou <<App>>');
    }

    $filepath = dirname(__DIR__) . '/' . implode('/', $namespacePart) . '.php';
    if(!file_exists($filepath)){
        throw new Exception("Fichier << " . $filepath . " >> introuvable pour la classe << " . $class . " >>. Vérifier le chemin, le nom de la classe ou le namespace");
    }

    require $filepath;
});