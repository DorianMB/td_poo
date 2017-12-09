<?php

namespace Ecrire;

require '../vendor/autoload.php';

$cahier = new Cahier;
$cahier->setFormat('a3');

$stylo = new Bic('bleu');

$stylo->ecrire('Foddfo')->sur($cahier);

$cahier->lire();

$stylo2 = new QuatreCouleurs();
$stylo2->ecrire('Bar')->en('rouge')->sur($cahier)->page(134);
$stylo2->ecrire('Un texte')->en('vert')->sur($cahier)->page(134);
$stylo2->ecrire('Un texte')->en('noir')->sur($cahier)->page(212);

$cahier->lire();

$stylo3 = new Criterium;
$stylo3->ecrire('Mon texte')->sur($cahier)->page(212);
$stylo3->ecrire('Baz')->sur($cahier)->page(134);

$cahier->lire();

$gomme = new Gomme;
$gomme->effacer($cahier, 134, 'texte');
$cahier->lire();

$gomme->effacer($cahier, 212);
$cahier->lire();

$gomme->effacer($cahier);
$cahier->lire();

