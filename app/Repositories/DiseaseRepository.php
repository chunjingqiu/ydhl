<?php
namespace App\Repositories;

use App\Models\Disease;
use DB;
/**
* 药品仓库
*/
class DiseaseRepository extends BaseRepository
{
	/**
	* model定义为私有，以免在其他地方调用
	*/
	protected $model;


	/**
	* 自动加载本Model类
	*/
	public function __construct(Disease $disease)
	{
		$this->model = $disease;
	}


	public function index($inputs, $extra = [], $size = '10')
	{
		$sql = $this->model
        	   		->where('level',$inputs['s_level']);
        // $types = $inputs['s_type'];	   		
		if(isset($inputs['s_type'])){
			if (strstr($inputs['s_type'],',')) {
				$types = explode(',',$inputs['s_type']);
				foreach ($types as $key => $type) {
					if (!empty($type)) {
        				$sql =$sql->whereRaw("FIND_IN_SET('".$type."',type)");
					}
				}

			}else{
        		$type = $inputs['s_type'];	   		
        		$sql =$sql->whereRaw("FIND_IN_SET('".$type."',type)");
			}
			
		}
       	
       	return $sql->get();

	}
	/**
	* 没有用到，目前。用left join两表联查。
	*/
	protected function getTypes($types){
		// SELECT * FROM `disease` LEFT JOIN types ON disease.id=types.disease_id WHERE types.type_name IN ('肥胖','矮小') GROUP BY disease_id HAVING(count(disease_id)>=2);
		$result = DB::table('types')
		->select(DB::raw('count(disease_id) as disease_count, type_name'))
		->whereIn('type_name',$types)
		->groupBy('disease_id')
		->having('disease_count','>=',count($types))
		->get();

	}
	
	public function edit($id, $extra)
	{
		
	}

	public function update($id, $inputs, $extra)
	{

	}
}