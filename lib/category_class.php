<?php

class category_class 
{
	public $items;
	private $table;
	public $group_items;
	function __construct($type=null,$name=null) {
		$table = new table_class(get_config('tb_category'));
		if(empty($name)){
			if(empty($type)){
				$items = $table->find('all');
			}else{
				$items = $table->find('all',array('conditions' => "category_type = '" .$type ."'",'order' => 'sort_id ,priority'));
			}
		}else{
			$items = $table->find('all',array('conditions' => "name = '" .$name ."'",'order' => 'sort_id,priority'));
		}
		
		if($items){
			foreach ($items as $item) {
				$this->items[$item->id] = $item;
				$this->group_items[$item->parent_id][]=$item->id;
				$this->group_items[$item->id] = array();
			}
		}
		
	}
	
	public function children_map($id, $include_self = true){
		
		if($include_self) $result[] = $id;
		if($this->group_items[$id]){
			foreach ($this->group_items[$id] as $g) {
				$result = array_merge($result,$this->children_map($g,true));
			}
		} 
		return $result;
		
	}
	
	public function &find($id){
		return $this->items[$id];
	}
	
	public function tree_map($current_id){
		$result = array();
		$result[] = $current_id;
		while(intval($current_id) > 0){
			$current = $this->find($current_id);
			if($current->parent_id){
				$result[] = $current->parent_id;
				$current_id = $current->parent_id;
			}
			else{
				break;
			}

		}
		return $result;
	}
	
	public function find_sub_category($parent_id=null){
		$ret = array();
		if(empty($parent_id)){
			foreach ($this->items as $v) {
				if(!$v->parent_id){
					array_push($ret, $v );
				}
			}
			return $ret;
		}
		if(array_key_exists($parent_id, $this->items)){
			return null;
		}

		foreach ($this->items as $v) {
			if($v->parent_id == $parent_id){
				array_push($ret ,$v );
			};
		}
	}
	
	public function echo_jsdata($var_name='category'){
		?>
		<script>
			var <?php echo $var_name;?> = new category_class();
			<?php if($this->items){ foreach ($this->items as $v) {
				echo "$var_name.push(new category_item_class('$v->id','$v->name','$v->parent_id','$v->priority'));";
			}}?>
		</script>
		<?php
	}
	
	public function echo_select($name="category_select"){
		?>
		<script>			
			var relation = new Array();			
		</script>
		<?php
	}
	
}
?>