<?php

defined('CONTROL') or die('Acesso Bloqueado');

//Sair da sessão
session_destroy();

//Volta para a pgani inicial
header('location: index.php?Caminho=Login');
?>