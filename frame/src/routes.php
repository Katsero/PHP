<?php

 

return [

    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],

    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],

    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],

    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'addComment'],

    '~^articles/(\d+)/comments/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'editComment'],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],

];