<?php

declare(strict_types=1);

// include __DIR__. "/../Framework/App.php";
require __DIR__. "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\HomeController;


$app = new App();

# NOTE - Normalized path
$app->get('/', [HomeController::class, 'home']); // registering home controller class, home (method) pass from controller
// dd($app);

return $app;