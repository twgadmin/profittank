<?php

namespace App\Repositories;

use App\Models\Interfaces\MediaFileInterface;
use App\Repositories\Interfaces\MediaFileRepositoryInterface;
use App\Repositories\Repository;

/**
 * Class MediaFileRepository
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
class MediaFileRepository extends Repository implements MediaFileRepositoryInterface
{
    protected $model;

    public function __construct(MediaFileInterface $model)
    {
        $this->model = $model;
    }
}
