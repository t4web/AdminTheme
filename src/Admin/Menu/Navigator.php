<?php

namespace Admin\Menu;


class Navigator {

    private $config = [];

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
            $resultConfig[$entry->getName()] = [
                'label' => $entry->getLabel(),
                'route' => $entry->getRoute(),
            ];
        }

        return $resultConfig;
    }

} 