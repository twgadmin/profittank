<?php

namespace App\Repositories;

use App\Models\Interfaces\ContactQueryInterface;
use App\Repositories\Interfaces\ContactQueryRepositoryInterface;
use App\Repositories\Repository;

/**
 * Class ContactQueryRepository
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
class ContactQueryRepository extends Repository implements ContactQueryRepositoryInterface
{
    protected $model;

    public function __construct(ContactQueryInterface $model)
    {
        $this->model = $model;
    }
}
