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
            $_SESSION["login"] = true;
            $_SESSION["email"] =  $email;

            header("location: http://localhost/polytech");
        }
        else{
            header("location: http://localhost/polytech/login");
        }
    }

}
