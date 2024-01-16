<?php

namespace Abhinay\Supplier\Controller\Adminhtml\Supplier;

use Abhinay\Supplier\Model\SupplierFactory;
use Magento\Framework\Registry;

/**
 * Class Add
 * @package Abhinay\Supplier\Controller\Adminhtml\Supplier
 */
class Add extends \Magento\Backend\App\Action
{
    /**
     * @var Registry|null
     */
    protected $_coreRegistry = null;
    /**
     * @var
     */
    protected $helper;

    /**
     * Add constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param Registry $registry
     * @param SupplierFactory $supplierFactory
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Session\SessionManagerInterface $coreSession
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        Registry $registry,
        supplierFactory $supplierFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Session\SessionManagerInterface $coreSession
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->supplierFactory = $supplierFactory;
        $this->_coreSession = $coreSession;
        $this->_messageManager = $context->getMessageManager();
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $supplierId = $this->getRequest()->getParam('id');
        $model = $this->supplierFactory->create();
        $model->load($supplierId);
        $this->_coreRegistry->register('supplier', $model);
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Abhinay_Supplier::supplier_add');
        $resultPage->getConfig()->getTitle()->prepend(__('Add Supplier'));
        return $resultPage;
    }
}
