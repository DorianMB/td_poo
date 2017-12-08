<?php

namespace Ecrire;

use Exception;

class QuatreCouleurs extends Stylo
{
    public const AVAILABLE_COLORS = ["bleu", "rouge", "noir", "vert"];

    public function setColor($color)
    {
        return parent::setColor(self::filterColor($color));
    }

    public static function filterColor($color)
    {
        $color = strtolower($color);

        if (!in_array($color, self::AVAILABLE_COLORS)) {
            throw new Exception("Cette couleur n'est pas disponible");
        }

        return $color;
    }


}
