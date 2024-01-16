<?php


namespace Abhinay\Supplier\Model\Resolver\DataProvider;

/**
 * Class Supplier
 * @package Abhinay\Supplier\Model\Resolver\DataProvider
 */
class Supplier
{
    /**
     * @var \Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory
     */
    protected $collectionFactory;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * Supplier constructor.
     * @param \Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory $collectionFactory
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory $collectionFactory,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->logger = $logger;
    }

    /**
     *  getSupplierData
     * @param $search_text , $filterId, $filterEmail, $pageSize, $currentPage
     * @return $supplierData
     */
    public function getSupplierData($search_text, $filterId, $filterEmail, $pageSize, $currentPage)
    {
        try {
            $collection = $this->collectionFactory->create();
            $currentPage = ($currentPage) ? $currentPage : 1;
            $pageSize = ($pageSize) ? $pageSize : 6;
            if (!empty($search_text) && $search_text != "") {
                $collection->addFieldToFilter(
                    array(
                        'name',
                        'email',
                    ),
                    array(
                        array('like' => '%' . $search_text . '%'),
                        array('like' => '%' . $search_text . '%'),
                    )
                );
            }

            if ((!empty($filterId)) && ($filterId !== "id")) {
                $collection->addFieldToFilter('id', $filterId);
            }

            if ((!empty($filterEmail)) && ($filterEmail !== "email")) {
                $collection->addFieldToFilter('email', $filterEmail);
            }

            $count = $collection->getSize();
            $total_pages = ceil($count / $pageSize);
            $collection->setPageSize($pageSize)->setCurPage($currentPage);

            $supplierData = [];
            foreach ($collection as $data) {
                $id = $data->getId();
                $supplierData[$id]['id'] = $data->getId();
                $supplierData[$id]['name'] = $data->getName();
                $supplierData[$id]['email'] = $data->getEmail();
                $supplierData[$id]['phone'] = $data->getPhone();
            }
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return [
            'total_count' => $count, 'total_pages' => $total_pages, 'supplierList' => $supplierData];
    }
}