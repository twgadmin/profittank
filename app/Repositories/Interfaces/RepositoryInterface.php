<?php

namespace App\Repositories\Interfaces;

/**
 * Interface RepositoryInterface
 *
 * @author Muhammad Shahab <muhammad.shahab@vservices.com>
 * @date 7/17/2019
 */
interface RepositoryInterface
{
    public function all();

    public function allBy($where = []);

    public function create(array $data);

    public function find($id);

    public function findBy($where = []);

    public function update($id, array $data);

    public function delete($id);
}
