<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths; // including the Paths.php

/** NOTE - responsible for rendering home page */
class HomeController
{
  private TemplateEngine $view;

  public function __construct()
  {
    $this->view = new TemplateEngine(Paths::VIEW); // path for rendering views
  }

  public function home()
  {
    echo $this->view->render("/index.php", [
      'title' => 'HOME PAGE †††'
      /** NOTE - becomes varibles because of extract() function from TemplateEngine class */
    ]);
    echo "THIS IS HOME PAGE!";
  }
}
