<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container9fjeodf\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container9fjeodf/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/Container9fjeodf.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\Container9fjeodf\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \Container9fjeodf\appDevDebugProjectContainer([
    'container.build_hash' => '9fjeodf',
    'container.build_id' => '92791152',
    'container.build_time' => 1552156574,
], __DIR__.\DIRECTORY_SEPARATOR.'Container9fjeodf');
