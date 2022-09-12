<?php

namespace Loop\MiniTracker\Api;

use Loop\MiniTracker\Api\Data\MiniTrackerInterface;

interface MiniTrackerRepositoryInterface
{
    /**
     * Save Tracking information.
     *
     * @param MiniTrackerInterface $data
     * @return MiniTrackerInterface
     */
    public function save(MiniTrackerInterface  $data);

    /**
     * Retrieve tracking information which match a specified criteria.
     *
     * @return \Loop\MiniTracker\Api\Data\MiniTrackerInterface[]
     */
    public function getList();
}
