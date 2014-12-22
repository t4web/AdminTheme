<?php

namespace Admin\Menu;


class Navigator {

    private $config = [];

    public function __construct()
    {
        $this->add(new Entry('Dashboard', 'admin-dashboard', 'fa fa-dashboard'));
        $this->add(new Entry('Admin', 'admin-default', 'fa fa-cog'));
    }

    /**
     * @param Entry $entry
     */
    public function add(Entry $entry)
    {
        $this->config[] = $entry;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->prepare($this->config);
    }

    private function prepare(array $config)
    {
        $resultConfig = [];

        /** @var Entry $entry */
        foreach ($config as $entry) {
            $resultConfig[$entry->getRoute()] = [
                'label' => $entry->getLabel(),
                'route' => $entry->getRoute(),
                'icon' => $entry->getIcon()
            ];
        }

        return $resultConfig;
    }

} 