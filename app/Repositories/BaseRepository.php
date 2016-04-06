<?php
 namespace App\Repositories;

 use App\Interfaces\IRepository;
 
 abstract  class BaseRepository implements IRepository{

 	/*
 	* The model instance.
 	*
 	* 
 	*/
 	protected $model;
 	
 	/**
 	* return This Model By Id
 	*
 	* @param int $id;
 	* @return App\Models\Model;
 	*/
 	public function getById($id){
 		return $this->model->findOrFail($id);
 	}

 	/**
 	* 继承 IRepository接口
 	* 具体功能可以由子类实现
 	*/
 	public function store($inputs = [] , $extra = ''){
 		return ;
 	}

 	/**
 	* 继承 IRepository接口
 	* 具体功能给可以由子类实现
 	*/
 	public function destory($inputs = [] , $extra = ''){
 		return ;
 	}
 }