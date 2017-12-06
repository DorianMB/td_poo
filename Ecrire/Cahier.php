<?php
/**
 * Created by PhpStorm.
 * User: dorian
 * Date: 06/12/2017
 * Time: 17:25
 */
namespace Ecrire;
class Cahier
{
    public const FORMATS_AUTORISES = ["A3","A4"];
    private $format;
    private $content;

    public function setFormat($format){
        $format = strtoupper($format);
        if (!in_array($format, self::FORMATS_AUTORISES)){
            throw new LogicException("Ce format n'est pas accepté");
        }

        $this->format = $format;
    }

    public function setContent(Phrase $phrase){
        $this->content = 'Ton texte '. $phrase->getContenu().' au format '. $this->format . ' en couleur ' . $phrase->getCouleur();
    }

    public function lire() {
        echo $this->content;
    }
}