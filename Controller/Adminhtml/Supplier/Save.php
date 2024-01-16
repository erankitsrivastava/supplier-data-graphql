<?php

namespace Abhinay\Supplier\Controller\Adminhtml\Supplier;

use Magento\Framework\Controller\ResultFactory;

class Save extends \Magento\Backend\App\Action
{

    protected $resultPageFactory = false;

    /**
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Abhinay\Supplier\Model\SupplierFactory $postFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Abhinay\Supplier\Model\SupplierFactory $postFactory
    )
    {
        parent::__construct($context);
        $this->_messageManager = $context->getMessageManager();
        $this->_resultFactory = $context->getResultFactory();
        $this->postFactory = $postFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $postData = $this->getRequest()->getParams();
        $model = $this->postFactory->create();
        if (isset($postData['id'])) {
            $model = $model->load($postData['id']);
        }
        try {
            $model->setName($postData['name']);
            $model->setEmail($postData['email']);
            $model->setPhone($postData['phone']);
            try {
                $model->save();
                $this->_messageManager->addSuccessMessage('Supplier added succesfully.');
            } catch (\Exception $e) {
                $this->_messageManager->addErrorMessage('Something went wrong while saving supplier');
            }
        } catch (Exception $e) {
            $this->_messageManager->addErrorMessage('Something went wrong ' . $e->getMessage());
        }
        $resultRedirect = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('supplier/supplier/index');
        return $resultRedirect;
    }
}
