<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;

class MainController extends AbstractController {

    public function home() {
        return $this->renderView('Main/index.php');
    }

}