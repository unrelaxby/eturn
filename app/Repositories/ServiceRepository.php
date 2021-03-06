<?php namespace App\Repositories;

use App\Models\Service;

class ServiceRepository implements RepositoryInterface
{

    /**
     * Get all services, ordered by title
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*'))
    {
        return Service::orderBy('title')->get($columns);
    }

    /**
     * Get all services which associated at least with one master
     */
    public function hasMasters()
    {
        return Service::has('users')->get();
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id, $columns = array('*'))
    {
        return Service::find($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        // TODO: Implement findBy() method.
    }
}