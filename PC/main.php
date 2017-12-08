<?php

use PC\Asus;
use PC\Mac;
use PC\Ordinateur;
use PC\Surface;

require '../vendor/autoload.php';


$mac = new Mac();
$asus = new Asus();
$surface = new Surface();

$mac->faitJoli();
$asus->jouer();
$surface->toucherEcran();


$mac->lireUnDvd();
$asus->lireUnDvd();
$surface->lireUnDvd();
