<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKndyu2t\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKndyu2t/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerKndyu2t.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerKndyu2t\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerKndyu2t\appDevDebugProjectContainer([
    'container.build_hash' => 'Kndyu2t',
    'container.build_id' => '83852ccb',
    'container.build_time' => 1582847825,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerKndyu2t');
