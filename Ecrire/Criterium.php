<?php

namespace Ecrire;

class Criterium extends \Ecrire\Stylo
{

    protected $color = 'gris';

    public function setColor($color)
    {
        throw new \Exception('Un criterium ne peut pas changer de couleur !');
    }
}
