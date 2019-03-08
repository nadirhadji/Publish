<?php

namespace Publish\PlatformBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PublishPlatformBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
