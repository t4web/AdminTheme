<?php

namespace Admin\Menu;


class Entry {

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $route;

    /**
     * @var string
     */
    private $icon;

    function __construct($label, $route, $icon = '')
    {
        $this->label = $label;
        $this->route = $route;
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

}