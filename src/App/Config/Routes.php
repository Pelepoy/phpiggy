<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, AboutController};

// need to manually add into composer autoload as "file": file path" then CLI composer dump-autoload
function registerRoutes(App $app)
{
  # NOTE - Normalized path
  $app->get('/', [HomeController::class, 'home']); // registering home controller class, home (method) pass from controller
  // dd($app);
  $app->get('/about', [AboutController::class, 'about']);
}