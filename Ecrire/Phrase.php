<?php

namespace Ecrire;

class Phrase
{
    private $content;
    private $color;

    public function __construct($content, Stylo $stylo)
    {
        $this->setContent($content)->setColor($stylo->getColor());
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function sur(Cahier $cahier)
    {
        $cahier->setContent($this);

        return $cahier;
    }

    public function en($color)
    {
        return $this->setColor(QuatreCouleurs::filterColor($color));
    }
}
