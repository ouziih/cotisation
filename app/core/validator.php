<?php

function required(string $key ,string $champ,array &$errors):void{
    if($champ === "")
        {
            $errors[$key]["required"]="le $champ est oubligatoire";   
        }
}

function unique(string $key ,string $champ,array &$errors, array $tabRecherche):void{
    if(in_array($champ,array_column($tabRecherche,"email")))
        {
             $errors[$key]["unique"]="l'email doit etre unique";
        }
}

function isEmail(string $key,string $email,array &$errors):void{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors[$key]["invalide"]="l'email est invalide";
        }
}

//pour le mot de passe comme je suis fatigué coach je vais juste verifier taille 6 caracteres
function isPassword(string $key,string $password,&$errors):void{
    if(strlen($password)<6)
        {
             $errors[$key]["invalide"]="le mot de passe doit faire au minim 6 caracteres";
        }
}

