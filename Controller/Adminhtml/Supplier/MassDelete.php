<?php

namespace Abhinay\Supplier\Controller\Adminhtml\Supplier;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $_filter;
    /**
     * @var \Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * MassDelete constructor.
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory $collectionFactory
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     */
    public function __construct(
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Abhinay\Supplier\Model\ResourceModel\Supplier\CollectionFactory $collectionFactory,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Message\ManagerInterface $messageManager
    )
    {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        try {
            $collection = $this->_filter->getCollection($this->_collectionFactory->create());
            $itemsDelete = 0;
            foreach ($collection as $item) {
                $item->delete();
                $itemsDelete++;
            }
            $this->messageManager->addSuccess('A total of %1 supplier(s) were deleted successfully.', $itemsDelete);
        } catch (Exception $e) {
            $this->messageManager->addError('Something went wrong while deleting the supplier ' . $e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('supplier/supplier/index');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Abhinay_Supplier::manage_supplier');
    }
}
