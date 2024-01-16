<?php

namespace Abhinay\Supplier\Block\Adminhtml\Supplier;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Save
 * @package Abhinay\Supplier\Block\Adminhtml\Supplier
 */
class Save extends Generic implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Supplier'),
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'class' => 'primary save-button',
            'sort_order' => 45,
        ];
    }
}
