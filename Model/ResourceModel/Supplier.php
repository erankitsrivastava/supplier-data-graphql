<?php

namespace Abhinay\Supplier\Model\ResourceModel;

/**
 * Class Supplier
 * @package Abhinay\Supplier\Model\ResourceModel
 */
class Supplier extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init("supplier", "id");
    }
}
