<?php
require_once(dirname(__DIR__) . "/models/UtilisateurModel.php");
require_once(dirname(__DIR__). "/core/validator.php");
require_once(dirname(__DIR__)."/core/sessionManager.php");


function login():void{
    if($_SERVER['REQUEST_METHOD']==="POST")
        {
            $errors = [];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $utilisateurs = getData("utilisateurs");

            required("email",$email,$errors);
            required("password",$password,$errors);

            if(empty($errors))
                {
                    $utilisateur = getUtilisateurByEmail($email,$utilisateurs);
                    if(!empty($utilisateurs))
                        {
                            if($utilisateur["password"] === $password)
                                {
                                    saveData("utilisateurConnecte",$utilisateur);
                                    $roles = $utilisateur["roles"];

                                    if (in_array("gerant", $roles)) {
                                    header("Location: http://ousmane.samba.odc.edu.sn/gerant/dashboard");
                                    exit();
                                    }
                                     else {
                                    header("Location: http://ousmane.samba.odc.edu.sn/apprenant/dashboard");
                                    exit();
                                    }

                                }
                        }
                }
            
        }
        else {
            require_once(dirname(__DIR__) . "/views/auth/connexion.html.php");
        }
    
}

function logout():void{
    removeData("utilisateurConnecte");
    header("Location: http://ousmane.samba.odc.edu.sn/login");
    exit();   
}

function inscription():void{
    if($_SERVER['REQUEST_METHOD']==="GET")
        {
            $errors = getData("errors");
            removeData("errors");
            require_once(dirname(__DIR__)."/views/auth/inscription.html.php");
        }
    else
        {
            $errors = [];
            $utilisateurs = getData("utilisateurs");
            $nomComplet = $_POST["nomComplet"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirPassword = $_POST["confirmPassword"];
            $roles = $_POST["roles"];

            required("nom",$nomComplet,$errors);
            required("email",$email,$errors);
            required("password",$password,$errors);

            unique("email",$email,$errors,$utilisateurs);

            isEmail("email",$email,$errors);

            isPassword("password",$password,$errors);

            if (empty($errors) && $password === $confirPassword) {
                $utilisateur = utilisateur($nomComplet, $email, $password, $roles);
                saveUtilisateur($utilisateur, $utilisateurs);
                saveData("utilisateurs", $utilisateurs);
                save("succes", "compte créé avec succès");
                header("Location: http://ousmane.samba.odc.edu.sn/login");
                exit();
            } else {
                if ($password !== $confirPassword) {
                    $errors["confirmPassword"] = "Les mots de passe ne correspondent pas.";
                }
                saveData("errors", $errors);
                header("Location: http://ousmane.samba.odc.edu.sn/apprenant/inscription");
                exit();
            }
        }
}

