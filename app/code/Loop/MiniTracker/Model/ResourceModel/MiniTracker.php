<?php

namespace Loop\MiniTracker\Model\ResourceModel;

class MiniTracker extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Construct function
     */
    protected function _construct()
    {
        $this->_init('loop_minitracker', 'id');
    }
}
