<?php

namespace Loop\MiniTracker\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;

use Loop\MiniTracker\Api\MiniTrackerRepositoryInterface;
use Loop\MiniTracker\Api\Data\MiniTrackerItemInterface;
use Loop\MiniTracker\Model\MiniTrackerFactory;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker as MiniTrackerResourceModel;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory;

/**
 * @api
 */
class MiniTrackerItem implements MiniTrackerItemInterface
{
    /**
     * @var \Loop\MiniTracker\Api\Data\MiniTrackerInterface
     */
    private $miniTracker;

    /**
     * @var \Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param \Loop\MiniTracker\Api\Data\MiniTrackerInterface $miniTracker
     * @param \Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Loop\MiniTracker\Api\Data\MiniTrackerInterface $miniTracker,
        \Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory  $collectionFactory
    ) {
        $this->miniTracker = $miniTracker;
        $this->collectionFactory = $collectionFactory;
    }
    /**
     * Retrun tracking information records.
     *
     * @return \Loop\MiniTracker\Api\Data\MiniTrackerInterface[]
     */
    public function getItems()
    {
        $collection = $this->collectionFactory->create();
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        return $objects;
    }
}
