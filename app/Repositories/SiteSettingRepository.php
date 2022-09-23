<?php

namespace App\Repositories;

use App\Models\Interfaces\SiteSettingInterface;
use App\Repositories\Interfaces\SiteSettingRepositoryInterface;
use App\Repositories\Repository;

/**
 * Class SiteSettingRepository
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
class SiteSettingRepository extends Repository implements SiteSettingRepositoryInterface
{
    protected $model;

    public function __construct(SiteSettingInterface $model)
    {
        $this->model = $model;
    }

    public function findFirst()
    {
        return $this->model::first();
    }
}
