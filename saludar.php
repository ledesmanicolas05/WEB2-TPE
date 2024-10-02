<?php 
session_start();
if(!isset($_SESSION['Nombredeusuario'])){
    echo 'No estas autenticado';
} else {
    echo "Hola, " . $_SESSION['Nombredeusuario'];
}