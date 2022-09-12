<?php

namespace Loop\MiniTracker\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Loop\MiniTracker\Api\MiniTrackerRepositoryInterface;
use Loop\MiniTracker\Api\Data\MiniTrackerInterface;

class Trackme implements ObserverInterface
{
    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productrepository;

    /**
     * @var \Loop\MiniTracker\Helper\Data
     */
    protected $helper;

    /**
     * @var MiniTrackerRepositoryInterface
     */
    protected $miniTrackerRepository;

    /**
     * @var MiniTrackerInterface
     */
    protected $miniTrackerModel;

    /**
     * @param \Magento\Catalog\Api\ProductRepositoryInterface   $productrepository
     * @param \Loop\MiniTracker\Helper\Data                     $helper
     * @param MiniTrackerRepositoryInterface                    $miniTrackerRepository
     * @param MiniTrackerInterface                              $miniTrackerInterface
     */
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productrepository,
        \Loop\MiniTracker\Helper\Data $helper,
        MiniTrackerRepositoryInterface $miniTrackerRepository,
        MiniTrackerInterface $miniTrackerInterface
    ) {
        $this->productrepository = $productrepository;
        $this->helper = $helper;
        $this->miniTrackerRepository = $miniTrackerRepository;
        $this->miniTrackerModel = $miniTrackerInterface;
    }

    /**
     * Save the tracking information on Add to cart.
     *
     * @param Observer $observer
     * @return void
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function execute(Observer $observer)
    {
        $data = $observer->getEvent()->getRequest()->getPostValue();
        $product = $this->productrepository->getById($data['product']);
        $response =  $this->helper->hitTheAPI();
        if (isset($response['code']) && $response['code'] != '') {
            $this->miniTrackerModel->setSku($product->getSku());
            $this->miniTrackerModel->setTrackingCode($response['code']);
            $this->miniTrackerModel->setTrackingMessage($response['message']);
            $this->miniTrackerRepository->save($this->miniTrackerModel);
        }
    }
}
