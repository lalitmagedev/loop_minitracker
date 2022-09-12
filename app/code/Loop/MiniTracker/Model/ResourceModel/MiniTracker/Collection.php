<?php

namespace Loop\MiniTracker\Model\ResourceModel\MiniTracker;

use Loop\MiniTracker\Model\MiniTracker as Model;
use Loop\MiniTracker\Model\ResourceModel\MiniTracker as ResourceModel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Construct function.
     */
    protected function _construct()
    {
        /* _init($model, $resourceModel) */
        $this->_init(Model::class, ResourceModel::class);
    }
}
