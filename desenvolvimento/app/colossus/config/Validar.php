<?php

session_start();
if (isset($_SESSION['login']->id_usuario)) {
    
} else {
    header('Location: http://www.rmsolutions.com.br/');
    exit;
}