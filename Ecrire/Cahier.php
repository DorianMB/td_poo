<?php

namespace Ecrire;

use Exception;

class Cahier
{
    public const FORMATS_AUTORISES = ["A3", "A4"];
    private $format;
    private $pages = [];

    public function setFormat($format)
    {
        $format = strtoupper($format);
        if (!in_array($format, self::FORMATS_AUTORISES)) {
            throw new Exception("Ce format n'est pas accepté");
        }

        $this->format = $format;
    }

    public function setContent(Phrase $phrase)
    {
        if (isset($this->pages['temp'])) {
            $this->page(0);
        }

        $this->pages['temp'] = $phrase;

        return $this;
    }


    public function lire()
    {
        foreach($this->pages as $numero => $phrases) {
            echo "\n Sur la page n° $numero du cahier format $this->format on peut trouver les phrases :\n";
            foreach ($phrases as $phrase) {
                /** @var \Ecrire\Phrase $phrase */
                echo "      {$phrase->getContent()} en {$phrase->getColor()}\n";
            }
        }
        echo "\n";
    }

    public function page($id)
    {
        if (!isset($this->pages[$id])) {
            $this->pages[$id] = [];
        }

        $this->pages[$id][] = $this->getTempPage();

        unset($this->pages['temp']);
    }

    public function getTempPage()
    {
        return $this->pages['temp'];
    }
}
