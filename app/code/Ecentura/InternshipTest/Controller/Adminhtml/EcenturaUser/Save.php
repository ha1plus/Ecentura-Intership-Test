<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Controller\Adminhtml\EcenturaUser;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('ecenturauser_id');
        
            $model = $this->_objectManager->create(\Ecentura\InternshipTest\Model\EcenturaUser::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Ecenturauser no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Ecenturauser.'));
                $this->dataPersistor->clear('ecentura_internshiptest_ecenturauser');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['ecenturauser_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Ecenturauser.'));
            }
        
            $this->dataPersistor->set('ecentura_internshiptest_ecenturauser', $data);
            return $resultRedirect->setPath('*/*/edit', ['ecenturauser_id' => $this->getRequest()->getParam('ecenturauser_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

