<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOdmaxzl\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOdmaxzl/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerOdmaxzl.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerOdmaxzl\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerOdmaxzl\appDevDebugProjectContainer([
    'container.build_hash' => 'Odmaxzl',
    'container.build_id' => '79e94deb',
    'container.build_time' => 1552319033,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOdmaxzl');
