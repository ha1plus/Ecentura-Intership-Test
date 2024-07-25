<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Model;

use Ecentura\InternshipTest\Api\Data\EcenturaUserInterface;
use Ecentura\InternshipTest\Api\Data\EcenturaUserInterfaceFactory;
use Ecentura\InternshipTest\Api\Data\EcenturaUserSearchResultsInterfaceFactory;
use Ecentura\InternshipTest\Api\EcenturaUserRepositoryInterface;
use Ecentura\InternshipTest\Model\ResourceModel\EcenturaUser as ResourceEcenturaUser;
use Ecentura\InternshipTest\Model\ResourceModel\EcenturaUser\CollectionFactory as EcenturaUserCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class EcenturaUserRepository implements EcenturaUserRepositoryInterface
{

    /**
     * @var ResourceEcenturaUser
     */
    protected $resource;

    /**
     * @var EcenturaUserCollectionFactory
     */
    protected $ecenturaUserCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var EcenturaUserInterfaceFactory
     */
    protected $ecenturaUserFactory;

    /**
     * @var EcenturaUser
     */
    protected $searchResultsFactory;


    /**
     * @param ResourceEcenturaUser $resource
     * @param EcenturaUserInterfaceFactory $ecenturaUserFactory
     * @param EcenturaUserCollectionFactory $ecenturaUserCollectionFactory
     * @param EcenturaUserSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceEcenturaUser $resource,
        EcenturaUserInterfaceFactory $ecenturaUserFactory,
        EcenturaUserCollectionFactory $ecenturaUserCollectionFactory,
        EcenturaUserSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->ecenturaUserFactory = $ecenturaUserFactory;
        $this->ecenturaUserCollectionFactory = $ecenturaUserCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(EcenturaUserInterface $ecenturaUser)
    {
        try {
            $this->resource->save($ecenturaUser);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the Ecentura User: %1',
                $exception->getMessage()
            ));
        }
        return $ecenturaUser;
    }

    /**
     * @inheritDoc
     */
    public function get($ecenturaUserId)
    {
        $ecenturaUser = $this->ecenturaUserFactory->create();
        $this->resource->load($ecenturaUser, $ecenturaUserId);
        if (!$ecenturaUser->getId()) {
            throw new NoSuchEntityException(__('Ecentura User with id "%1" does not exist.', $ecenturaUserId));
        }
        return $ecenturaUser;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->ecenturaUserCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(EcenturaUserInterface $ecenturaUser)
    {
        try {
            $ecenturaUserModel = $this->ecenturaUserFactory->create();
            $this->resource->load($ecenturaUserModel, $ecenturaUser->getEcenturauserId());
            $this->resource->delete($ecenturaUserModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Ecentura User: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($ecenturaUserId)
    {
        return $this->delete($this->get($ecenturaUserId));
    }
}

