<?php

namespace Ecrire;

class Stylo
{
    protected $color;

    public function ecrire($content)
    {
        return new Phrase($content, $this);
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

}
