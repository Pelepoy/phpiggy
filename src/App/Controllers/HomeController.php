<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths; // including the Paths.php

/** NOTE - responsible for rendering home page */
class HomeController
{
  public function __construct(private TemplateEngine $view)
  {
  }

  public function home()
  {
    echo $this->view->render("/index.php", [
      'title' => 'Home page', // dynamic title for browser 
      'greet' => 'Hiii'
      /** NOTE - becomes varibles because of extract() function from TemplateEngine class */
    ]);
    // echo "THIS IS HOME PAGE!";
  }
}
