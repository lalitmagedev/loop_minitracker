<?php

namespace Loop\MiniTracker\Model;

use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Loop\MiniTracker\Api\MiniTrackerRepositoryInterface;
use Loop\MiniTracker\Api\Data\MiniTrackerInterface;
use Loop\MiniTracker\Model\MiniTrackerFactory;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker as MiniTrackerResourceModel;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory;
use Loop\MiniTracker\Api\Data\MiniTrackerItemInterface;

/**
 * @api
 */
class MiniTrackerRepository implements MiniTrackerRepositoryInterface
{

    /**
     * @var \Loop\MiniTracker\Model\ResourceModel\MiniTracker
     */
    protected $resourceModel;

    /**
     * @var \Loop\MiniTracker\Model\MiniTrackerFactory
     */
    protected $miniTrackerFactory;

    /**
     * @var \Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Magento\Framework\Api\SearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var \Loop\MiniTracker\Api\Data\MiniTrackerItemInterface
     */
    private $miniTrackerItem;

    /**
     * @param MiniTrackerResourceModel      $resourceModel
     * @param MiniTrackerFactory            $miniTrackerFactory
     * @param DataObjectProcessor           $dataObjectProcessor
     * @param CollectionFactory             $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param MiniTrackerItemInterface      $miniTrackerItem
     */
    public function __construct(
        MiniTrackerResourceModel $resourceModel,
        MiniTrackerFactory  $miniTrackerFactory,
        DataObjectProcessor $dataObjectProcessor,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        MiniTrackerItemInterface $miniTrackerItem
    ) {
        $this->resourceModel = $resourceModel;
        $this->miniTrackerFactory = $miniTrackerFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->miniTrackerItem = $miniTrackerItem;
    }

    /**
     * Save Tracking information.
     *
     * @param \Loop\MiniTracker\Api\Data\MiniTrackerInterface $miniTracker
     * @return \Loop\MiniTracker\Api\Data\MiniTrackerInterface
     */
    public function save(MiniTrackerInterface $miniTracker)
    {
        try {
            $this->resourceModel->save($miniTracker);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $miniTracker;
    }

    /**
     * Retrun tracking information records.
     *
     * @return \Loop\MiniTracker\Api\Data\MiniTrackerItemInterface
     */
    public function getList()
    {
        return $this->miniTrackerItem;
    }
}
