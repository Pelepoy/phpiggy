<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class TemplateDataMiddleware implements MiddlewareInterface
{
  public function __construct(private TemplateEngine $view) // TemplateEngine Class as dependency $view
  {
    // router is the responsible for instantiating a middleware 
  }
  public function process(callable $next)
  {
    $this->view->addGlobal('title', 'Expense Tracking App'); // global template extracts array from templateengine class

    $next();
  }
}
