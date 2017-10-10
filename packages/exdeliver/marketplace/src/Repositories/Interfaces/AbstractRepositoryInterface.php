<?php namespace Exdeliver\Marketplace\Repositories\Interfaces;

interface AbstractRepositoryInterface
{
    public function create(array $attributes);

    public function all($columns = array('*'));

    public function lists($column,$key);

    public function pluck($column,$key);

    public function first();

    public function update(array $attributes, $id);

    public function delete($id);

    public function get($id);

    public function has($relation);

    public function with($relations);

    public function whereHas($relation, $closure);

    public function orderBy($column, $direction = 'asc');

    public function where($column, $condition, $value);

    public function visible(array $fields);
}