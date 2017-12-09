<?php

namespace Ecrire;

class Gomme
{


    public function effacer(Cahier $cahier, $page = null, $words = null)
    {
        if (!$page) {
            $cahier->setPages([]);
            return;
        }

        $pages = $cahier->getPages();

        if (!$words) {
            unset($pages[$page]);
        } else {
            foreach ($pages[$page] as $key => $phrase) {
                /** @var \Ecrire\Phrase $phrase */
                if(strpos($phrase->getContent(), $words) !== false) {
                    unset($pages[$page][$key]);
                }
            }
        }

        $cahier->setPages($pages);
    }
}
