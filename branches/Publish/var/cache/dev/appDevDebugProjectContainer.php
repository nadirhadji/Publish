<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCxprlda\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCxprlda/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerCxprlda.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerCxprlda\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerCxprlda\appDevDebugProjectContainer([
    'container.build_hash' => 'Cxprlda',
    'container.build_id' => 'be8833b7',
    'container.build_time' => 1552407547,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCxprlda');
