<?php

namespace ConnexionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ConnexionBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
