<?php
namespace Simple\Controller;

use Mvc\Core\Controller;

class IndexController extends Controller
{
    /**
     * Default index action
     */
    public function actionIndex() {
        $this->getApp()->contentType('text/html');

        $data = array(
            'title' => 'E-vidence API 1.0',
            'content' => 'E-vidence really work with Slim framework in MVC Design! Have fun and good luck \o/ <br/><br/><b> Yoda tips:</b> when you look at the dark side, careful you must be, for the dark side looks back.'
        );

        $this->render("index/index.phtml", $data);
    }
}
