<?php

    session_start();

    function errorMessage(){
        if(isset($_SESSION['errorMessage'])) {
            $thisMessage = '<div class="alert alert-danger"><i class="fa fa-warning" aria-hidden="true"></i> ' 
                        . $_SESSION["errorMessage"].'</DIV>';
                        //Setting it NULL tO never stay displayied
            $_SESSION["errorMessage"] = NULL;
            return $thisMessage;
        }
    }

    function successMessage(){
        if(isset($_SESSION["successMessage"])) {
            $thisMessage2 = '<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> ' 
                        . $_SESSION["successMessage"].'</DIV>';
                        //Setting it NULL tO never stay displayied
            $_SESSION["successMessage"] = NULL;
            return $thisMessage2;
        }
    }


?>