<?php

namespace Abhinay\Supplier\Model;

/**
 * Class Supplier
 * @package Abhinay\Supplier\Model
 */
class Supplier extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init("Abhinay\Supplier\Model\ResourceModel\Supplier");
    }
}
