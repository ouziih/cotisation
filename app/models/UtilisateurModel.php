<?php

function saveUtilisateur(array $utilisateur,array &$utilisateurs):void{
    array_push($utilisateurs,$utilisateur);
}

function utilisateur(string $nom,string $email, string $password, array $roles):array{
    if(in_array("apprenant",$roles))
        {
            $datesInscription = date('d/m/Y');
        }
    else
        {
            $datesInscription = null;
        }
        
    return [
        "nomComplet" => $nom,
        "email" => $email,
        "password" => $password,
        "roles" => $roles,
        "datesInscription" => $datesInscription,
        "estActif"=> null,
        "estAjour"=> null
    ];
}

function getUtilisateurByEmail(string $email,array $utilisateurs):array{
    foreach ($utilisateurs as $index => $utilisateur) {
        if($email === $utilisateur["email"])
            {
                return $utilisateur;
            }
    }
    return [];
}