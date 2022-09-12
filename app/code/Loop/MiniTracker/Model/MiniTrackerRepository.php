<?php

namespace Loop\MiniTracker\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;

use Loop\MiniTracker\Api\MiniTrackerRepositoryInterface;
use Loop\MiniTracker\Api\Data\MiniTrackerInterface;
use Loop\MiniTracker\Model\MiniTrackerFactory;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker as MiniTrackerResourceModel;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker\CollectionFactory;

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
     * @param MiniTrackerResourceModel      $resourceModel
     * @param MiniTrackerFactory            $miniTrackerFactory
     * @param DataObjectProcessor           $dataObjectProcessor
     * @param CollectionFactory             $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        MiniTrackerResourceModel $resourceModel,
        MiniTrackerFactory  $miniTrackerFactory,
        DataObjectProcessor $dataObjectProcessor,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resourceModel = $resourceModel;
        $this->miniTrackerFactory = $miniTrackerFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
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
     * @return \Loop\MiniTracker\Api\Data\MiniTrackerInterface[]
     */
    public function getList()
    {

        $collection = $this->collectionFactory->create();
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        return $objects;
    }
}
