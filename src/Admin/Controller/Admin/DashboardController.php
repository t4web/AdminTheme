<?php

namespace Admin\Controller\Admin;

use Zend\Mvc\Controller\AbstractActionController;

class DashboardController extends AbstractActionController
{
    public function defaultAction()
    {
        die(var_dump(__METHOD__));
    }
}
