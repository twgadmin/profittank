<?php

namespace App\Repositories;

use App\Models\Interfaces\AdminInterface;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Repository;

/**
 * Class AdminRepository
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
class AdminRepository extends Repository implements AdminRepositoryInterface
{
    protected $model;

    public function __construct(AdminInterface $model)
    {
        $this->model = $model;
    }

    public function update($id, array $data)
    {
        // base admin's status cannot be set
        if ($id == 1 and array_key_exists('is_active', $data)) {
            unset($data['is_active']);
        }

        $this->model::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        // base admin cannot be deleted
        if ($id > 1) {
            $this->model::where('id', $id)->delete();
        }
    }
}
