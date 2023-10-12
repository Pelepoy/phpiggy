<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Config\Paths;

return [
  //injectable dependencies
  TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
  ValidatorService::class => fn () => new ValidatorService()
];
