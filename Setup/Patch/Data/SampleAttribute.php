<?php

declare(strict_types=1);

namespace Abhinay\Supplier\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type;
use Psr\Log\LoggerInterface;

/**
 * Class SampleAttribute
 * @package Abhinay\ApiOveride\Setup\Patch\Data
 */
class SampleAttribute implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SampleAttribute constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        LoggerInterface $logger
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->logger = $logger;
    }

    /**
     * Applying Patch for creating new product attribute
     */
    public function apply()
    {
        try {
            $productTypes = implode(',', [Type::TYPE_SIMPLE, Type::TYPE_VIRTUAL]);
            $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
            $eavSetup->addAttribute(Product::ENTITY, 'supplier', [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Supplier',
                'input' => 'select',
                'class' => '',
                'source' => \Abhinay\Supplier\Model\Source\Config\Options::class,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '0',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => $productTypes
            ]);

        } catch (\Exception $e) {
            $this->logger->critical($e);
        }
    }

    /**
     * @return array
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getAliases(): array
    {
        return [];
    }
}
