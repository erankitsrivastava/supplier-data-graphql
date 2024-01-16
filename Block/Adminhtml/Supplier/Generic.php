<?php

namespace Abhinay\Supplier\Block\Adminhtml\Supplier;

use Magento\Backend\Block\Widget\Context;

/**
 * Class Generic
 * @package Abhinay\Supplier\Block\Adminhtml\Supplier
 */
class Generic
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * GenericButton constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = []) {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }

    /**
     * @return mixed
     * return SupplierId
     */
    public function getId() {
        return $this->context->getRequest()->getParam('id');
    }
}
