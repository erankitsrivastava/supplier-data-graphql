<?php

namespace Abhinay\Supplier\Block\Adminhtml\Supplier;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Delete
 * @package Abhinay\Supplier\Block\Adminhtml\Supplier
 */
class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * @return array
     * @return Delete button
     */
    public function getButtonData()
    {
        $deleteArray = [];
        if ($this->getId()) {
            $deleteArray = [
                'label' => __('Delete Supplier'),
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure want to do this Supplier?'
                    ) . '\', \'' . $this->getDeleteSupplierUrl() . '\')',
                'sort_order' => 20,
                'class' => 'delete',
            ];
        }
        return $deleteArray;
    }

    /**
     * @return string
     * @return Delete Supplier Url
     */
    public function getDeleteSupplierUrl()
    {
        return $this->getUrl('supplier/supplier/delete', ['id' => $this->getId()]);
    }
}
