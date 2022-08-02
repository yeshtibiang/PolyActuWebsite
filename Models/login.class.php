<?php

class Login extends Db {

    public function __construct()
    {
    }

    public function login($email, $password){

        $log = new SoapClient("http://192.168.1.2:8586/authentificationWS?wsdl");
        $param = new stdClass();

        var_dump($password);

        $param->email = $email;
        $param->password = $password;

        $rep = $log->__soapCall("login", array($param));

        $resultat = $rep->return;


        if ($resultat != null){
            if ($resultat->autorized == "admin"){
                $_SESSION["email"] = $email;
                $_SESSION["role"] = "admin";
                header("location: http://localhost/polytech/admin");
            }
            elseif($resultat->autorized){
                $_SESSION["email"] = $email;
                $_SESSION["role"] = "user";
                header("location: http://localhost/polytech");
            }
            else{
                $errorMessage = "Vous n'êtes pas autorisé à vous connecter!";
                header("location: http://localhost/polytech/login?errorMessage=".$errorMessage);
            }

//            $_SESSION["login"] = true;
//            $_SESSION["email"] =  $email;
//
//            header("location: http://localhost/polytech");
        }
        else{
            header("location: http://localhost/polytech/login");
        }
    }

}
