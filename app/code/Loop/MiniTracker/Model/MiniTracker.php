<?php

namespace Loop\MiniTracker\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Loop\MiniTracker\Api\Data\MiniTrackerInterface;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker as ResourceModel;

class MiniTracker extends AbstractModel implements MiniTrackerInterface, IdentityInterface
{
    /**
     * Cache tag.
     */
    public const CACHE_TAG = 'loop_mini_tracker';

    /**
     * Construct function.
     */
    protected function _construct()
    {
        /* _init($resourceModel)  */
        $this->_init(ResourceModel::class);
    }

    /**
     * Returns identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrun SKU
     *
     * @return string|null
     */
    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    /**
     * Set SKU
     *
     * @param string $sku
     * @return \Loop\MiniTracker\Model\MiniTracker
     */
    public function setSku($sku)
    {
        $this->setData(self::SKU, $sku);
    }

    /**
     * Return Tracking Code
     *
     * @return string|null
     */
    public function getTrackingCode()
    {
        return $this->getData(self::TRACKING_CODE);
    }

    /**
     * Set Tracking code
     *
     * @param string $trackingCode
     * @return \Loop\MiniTracker\Model\MiniTracker
     */
    public function setTrackingCode($trackingCode)
    {
        $this->setData(self::TRACKING_CODE, $trackingCode);
    }

    /**
     * Return Tracking message
     *
     * @return string|null
     */
    public function getTrackingMessage()
    {
        return $this->getData(self::TRACKING_MESSAGE);
    }

    /**
     * Set tracking message
     *
     * @param string $trackingMessage
     * @return \Loop\MiniTracker\Model\MiniTracker
     */
    public function setTrackingMessage($trackingMessage)
    {
        $this->setData(self::TRACKING_MESSAGE, $trackingMessage);
    }

    /**
     * Return Created date
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set Created date
     *
     * @param string $createdAt
     * @return \Loop\MiniTracker\Model\MiniTracker
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }
}
