<?php

namespace Repository;

abstract class DbRepository {

    /**
     * Eloquent model
     */
    protected $model;
    /**
     * @param $model
     */
    function __construct($model)
    {
    	$this->model = $model;
    }

     /**
     * Fetch a record by id
     *
     * @param $id
     * @return mixed
     */

	public function getById($id)
	{
		return $this->model->find($id);
	}

	public function getAll()
	{
		return $this->model->all();
	}
}