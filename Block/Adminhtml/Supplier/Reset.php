<?php

namespace Abhinay\Supplier\Block\Adminhtml\Supplier;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Reset
 * @package Abhinay\Supplier\Block\Adminhtml\Supplier
 */
class Reset implements ButtonProviderInterface {

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'on_click' => 'location.reload();',
            'class' => 'reset-form',
            'sort_order' => 35
        ];
    }
}
