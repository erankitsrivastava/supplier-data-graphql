<?php
declare(strict_types=1);

namespace Abhinay\Supplier\Model\Source\Config;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

/**
 * Class Options
 * @package Abhinay\Supplier\Model\Source\Config
 */
class Options extends AbstractSource
{
    /**
     * @return array
     */
    public function getAllOptions(): array
    {
        $this->_options = [
            ['label' => 'Supp A', 'value' => 'supp_a'],
            ['label' => 'Supp B', 'value' => 'supp_b'],
            ['label' => 'Supp C', 'value' => 'supp_c']
        ];
        return $this->_options;
    }
}
