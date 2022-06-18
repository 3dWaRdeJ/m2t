<?php

namespace Training\TestOM\Model;

class PlayWithTest
{
    private $_testObject;
    private $_testObjectFactory;
    private $_manager;

    public function __construct(
        \Training\TestOM\Model\Test $testObject,
        \Training\TestOM\Model\TestFactory $testObjectFactory,
        \Training\TestOM\Model\ManagerCustomImplementation $manager
    ) {
        $this->_testObject = $testObject;
        $this->_testObjectFactory = $testObjectFactory;
        $this->_manager = $manager;
    }
    public function run()
    {
        $result = $this->_testObject->log();

        $customArrayList = ['item1' => 'aaaaa', 'item2' => 'bbbbb'];
        $newTestObject = $this->_testObjectFactory->create([
            'arrayList' => $customArrayList,
            'manager' => $this->_manager
        ]);
        $result .= $newTestObject->log();
        return $result;
    }
}
