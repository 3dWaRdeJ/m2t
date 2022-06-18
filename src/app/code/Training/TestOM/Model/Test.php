<?php

namespace Training\TestOM\Model;

class Test
{
    private $_manager;
    private $_arrayList;
    private $_name;
    private $_number;
    private $_managerFactory;

    public function __construct(
        ManagerInterface $manager,
        $name,
        int $number,
        array $arrayList,
        \Training\TestOM\Model\ManagerInterfaceFactory $managerFactory
    ) {
        $this->_manager = $manager;
        $this->_name = $name;
        $this->_number = $number;
        $this->_arrayList = $arrayList;
        $this->_managerFactory = $managerFactory;
    }

    public function log(): string
    {
        $newManager = $this->_managerFactory->create();
        return '<pre>'
            . print_r(get_class($this->_manager), true)
            . '<br>'
            . print_r($this->_name, true)
            . '<br>'
            . print_r($this->_number, true)
            . '<br>'
            . print_r($this->_arrayList, true)
            . '<br>'
            . print_r($newManager, true)
            . '</pre>';
    }
}
