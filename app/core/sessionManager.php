<?php

function startSession():void{
    if(session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
}

function saveData(string $key, array $data):void{
    $_SESSION[$key] = $data;
}

function getData(string $key):array{
    return $_SESSION[$key] ?? [];
}

function removeData(array $key):void{
    unset($_SESSION[$key]);
}

function save(string $key, string $msg):void{
     $_SESSION[$key] = $data;
}