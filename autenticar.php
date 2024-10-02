<?php 
session_start();
$_SESSION['Nombredeusuario'] = 'Nico';
$_SESSION['id'] = '1234';
$_SESSION['Rol'] = 'ADMIN';

echo "Autenticado";