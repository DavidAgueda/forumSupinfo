<?php

session_start();
session_destroy();
unset($_COOKIE['id']);
unset($_COOKIE['username']);
unset($_COOKIE['password']);

header ('Location: connexion.php');

