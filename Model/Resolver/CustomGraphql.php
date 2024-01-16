<?php

namespace Abhinay\Supplier\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class CustomGraphql
 * @package Abhinay\Supplier\Model\Resolver
 */
class CustomGraphql implements ResolverInterface
{
    /**
     * @var DataProvider\Supplier
     */
    private $supplierDataProvider;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * CustomGraphql constructor.
     * @param DataProvider\Supplier $supplierDataProvider
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Abhinay\Supplier\Model\Resolver\DataProvider\Supplier $supplierDataProvider,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->supplierDataProvider = $supplierDataProvider;
        $this->logger = $logger;
    }

    /**
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|\Magento\Framework\GraphQl\Query\Resolver\Value|mixed
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $search_text = isset($args['search']) ? $args['search'] : '';
        $filterId = isset($args['filter']['id']['eq']) ? $args['filter']['id']['eq'] : '';
        $filterEmail = isset($args['filter']['email']['eq']) ? $args['filter']['email']['eq'] : '';
        $pageSize = $args['pageSize'];
        $currentPage = $args['currentPage'];
        $supplierData = $this->supplierDataProvider->getSupplierData($search_text, $filterId, $filterEmail, $pageSize, $currentPage);
        return $supplierData;
    }
}
