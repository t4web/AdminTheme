<?php

namespace Admin\Controller\Admin;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PhpinfoController extends AbstractActionController
{
    public function defaultAction()
    {
        $view = new ViewModel();

        ob_start();
        phpinfo();
        $info = ob_get_contents();
        ob_end_clean();

        $info = preg_replace ( '%^.*<body>(.*)</body>.*$%ms', '$1', $info);
        $info = str_replace('<table ', '<table class="table table-bordered" ', $info);

        $view->info = $info;

        return $view;
    }
}
