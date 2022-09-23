<?php

namespace App\Repositories;

use App\Models\Interfaces\UserInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Repository;
use DB;

/**
 * Class UserRepository
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
class UserRepository extends Repository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(UserInterface $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $groupConcat = "GROUP_CONCAT(DISTINCT investments.property_id)";
        $selectRaw   = "$groupConcat AS properties_invested,
            LENGTH($groupConcat) - LENGTH(REPLACE($groupConcat, ',', '')) + 1 AS num_of_projects,
            users.*";

        return  $this->model::select(DB::raw($selectRaw))
            ->leftJoin('investments', 'users.id', '=', 'investments.user_id')
            ->groupBy('users.id')
            ->get();
    }

    public function getInvestorToProperty($where = [])
    {
        $groupConcat = "GROUP_CONCAT(DISTINCT investments.user_id)";
        $selectRaw   = "users.name,users.email, properties.title as property_title";

        return  $this->model::select(DB::raw($selectRaw))
            ->leftJoin('investments', 'users.id', '=', 'investments.user_id')
            ->leftJoin('properties', 'properties.id', '=', 'investments.property_id')
            ->where($where)
            ->get()
            ->toArray();
    }
}
