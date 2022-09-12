<?php

namespace Loop\MiniTracker\Api\Data;

interface MiniTrackerInterface
{
    /**
     * Id
     */
    public const DATA_ID = 'id';

    /**
     * SKU
     */
    public const SKU = 'sku';

    /**
     * Tracking code
     */
    public const TRACKING_CODE = 'tracking_code';

    /**
     * Tracking message
     */
    public const TRACKING_MESSAGE = 'tracking_message';

    /**
     * Created Date
     */
    public const CREATED_AT = 'created_at';

    /**
     * Get SKU
     *
     * @return string
     */
    public function getSku();

    /**
     * Set SKU
     *
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku);

    /**
     * Return tracking code
     *
     * @return string
     */
    public function getTrackingCode();

    /**
     * Save tracking code
     *
     * @param string $trackingCode
     * @return $this
     */
    public function setTrackingCode(string $trackingCode);

    /**
     * Return tracking message
     *
     * @return string
     */
    public function getTrackingMessage();

    /**
     * Save tracking message
     *
     * @param string $trackingMessage
     * @return $this
     */
    public function setTrackingMessage(string $trackingMessage);

    /**
     * Return created date
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Save created date
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt);
}
