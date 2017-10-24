<?php

namespace Exdeliver\Marketplace\Repositories;

use Illuminate\Database\Eloquent\Model;

use Exdeliver\Marketplace\Repositories\Interfaces\AbstractRepositoryInterface;

abstract class AbstractRepository implements AbstractRepositoryInterface
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        return $model;
    }

    public function findOrFail($id)
    {
        $model = $this->model->findOrFail($id);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return $model;
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    /*
     * Get all (selected columns)
     */
    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function select($columns = array('*'))
    {
        return $this->model->select($columns);
    }

    /*
     * Get Lists
     */
    public function lists($column = array('*'), $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    /*
 * Get Lists
 */
    public function pluck($column = array('*'), $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    /*
 * Get Lists
 */
    public function getAll()
    {
        return $this->model->get();
    }

    public function paginate($amount)
    {
        return $this->model->paginate($amount);
    }

    public function search($query)
    {
        try {
            return $this->model->search($query);
        } catch (\Exception $e) {
            dd('ERROR No searchable threat has been added to this modal!');
        }
    }

    public function first()
    {
        return $this->model->first();
    }

    public function firstOrFail()
    {
        return $this->model->firstOrFail();
    }

    /**
     * Check if entity has relation
     *
     * @param string $relation
     *
     * @return $this
     */
    public function has($relation)
    {
        $this->model = $this->model->has($relation);
        return $this;
    }

    /**
     * Load relations
     *
     * @param array|string $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    /**
     * Load relation with closure
     *
     * @param string $relation
     * @param closure $closure
     *
     * @return $this
     */
    public function whereHas($relation, $closure)
    {
        $this->model = $this->model->whereHas($relation, $closure);

        return $this;
    }

    public function whereNull($column)
    {
        $this->model = $this->model->whereNull($column);
        return $this;
    }


    public function orderBy($column, $direction = 'asc')
    {
        $this->model = $this->model->orderBy($column, $direction);
        return $this;
    }

    public function where($column, $condition, $value)
    {
        $this->model = $this->model->where($column, $condition, $value);
        return $this;
    }

    public function whereBetween($column, $value)
    {
        $this->model = $this->model->whereBetween($column, $value);
        return $this;
    }

    public function whereTranslation($column, $value)
    {
        $this->model = $this->model->whereTranslation($column, $value);
        return $this;
    }

    public function whereIn($column, $value)
    {
        $this->model = $this->model->whereIn($column, $value);
        return $this;
    }

    public function groupBy($column)
    {
        $this->model = $this->model->groupBy($column);
        return $this;
    }

    public function distinct($column = null)
    {
        $this->model = $this->model->distinct($column);
        return $this;
    }

    /**
     * Set visible fields
     *
     * @param array $fields
     *
     * @return $this
     */
    public function visible(array $fields)
    {
        $this->model->setVisible($fields);
        return $this;
    }

    public function getAttribute($key)
    {
        return $this->model->getAttribute(snake_case($key));
    }

    public function setAttribute($key, $value)
    {
        return $this->model->setAttribute(snake_case($key), $value);
    }

    public function active($state = 1)
    {
        return $this->model->where('active', '=', $state);
    }

}