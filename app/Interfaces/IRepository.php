<?php
namespace App\Interfaces;

/**
* 定义IReposidory接口
* 定义的接口，继承者必须全部实现定义的方法
* @author tang
*/

interface IRepository{
 

 	/**
	* 资源列表
	* @param array $data必须传入的数据，查询条件
	* @param array|string $extra 可选传入参数
	* @param string $size 分页大小 存在默认值
 	**/
	public function index($data, $extra, $size);

	/**
	* 资源存储
	* @param array $inputs 需要存储的数据
	* @param array|string $extra 可选额外传入的数据
	**/
	public function store($inputs, $extra);

	/**
	* 编辑特定 id 资源
	* @param int $id 资源id
	* @param array|string $extra 可选传入参数
	*/
	public function edit($id, $extra);

	/**
	* 更新特定资源 id
	* @param int $id 特定资源ID
	* @param array $inputs必须传入与更新相关的数据
	* @param array|sting $extra 可选传入参数
	*/
	public function update($id, $inputs, $extra);

	/**
	* 删除特定资源
	* @param int $id 特定资源id
	* @param array|string $extra 可选传入参数
	*/
	public function destory($id,$extra);	
} 