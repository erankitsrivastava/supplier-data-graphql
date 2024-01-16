<?php

namespace Abhinay\Supplier\Model\ResourceModel\Supplier;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Abhinay\Supplier\Model\ResourceModel\Supplier
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    public function _construct()
    {
        $this->_init(
            'Abhinay\Supplier\Model\Supplier',
            'Abhinay\Supplier\Model\ResourceModel\Supplier'
        );
    }
}
