<?php

namespace Abhinay\Supplier\Ui\Supplier\Form;

use Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class DataProvider
 * @package Abhinay\Supplier\Ui\Supplier\Form
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Abhinay\Supplier\Model\ResourceModel\Supplier\Collection
     */
    protected $collection;
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    /**
     * @var
     */
    protected $loadedData;

    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $postCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $postCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $postCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->meta = $this->prepareMeta($this->meta);
    }

    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $post) {
            $post = $post->load($post->getId());
            $data = $post->getData();
            $postId = [];
            if (!empty($postData)) {
                foreach ($postData as $newData) {
                    $postId[] = (array)$newData;
                }
            }
            $data['supplier_add_form_data_source'] = $postId;
            $this->loadedData[$post->getId()] = $data;
        }
        return $this->loadedData;
    }
}
