<?php
  require_once('../frame.php');
	
	if('del_all'== $_POST['post_type']){
		$db = get_db();
		$db->echo_sql = true;
		$db->execute("delete from {$_POST['tbname']} where id in ({$_POST['ids']})");
		exit();
	}
	$post = new table_class($_POST['db_table']);
	if("del"==$_POST['post_type'])
	{
			if($_POST['db_table'] == $tb_news){
				$db = get_db();
				$post->find($_POST['del_id']);
				if($post->language_tag==1){
					$db->execute("delete from fb_news_relationship where english_news_id={$_POST['del_id']}");
				}else{
					$db->query("select english_news_id from fb_news_relationship where chinese_news_id={$_POST['del_id']}");
					if($db->move_first()){
						$e_id = $db->field_by_index(0);
						$db->execute("delete from fb_news_relationship where english_news_id={$e_id}");
						$post->delete($e_id);
					}
				}
			}elseif ($_POST['db_table'] == 'fb_industry'){
				$db = get_db();
				$db->execute("delete from fb_company_industry where industry_id = {$_POST['del_id']}");
			}elseif ($_POST['db_table'] == 'fb_gs'){
				$db = get_db();
				$db->execute("delete from fb_company_industry where company_id = {$_POST['del_id']}");
			}elseif($_POST['db_table'] == 'fb_admin_menu'){
				$db=get_db();
				$right = new table_class('fb_rights');
				$right->find('first',array('conditions' => "name='{$_POST['del_id']}' and type=2"));
				if($right->id){
					$db->execute("delete from fb_role_rights where rights_id = {$right->id}");
					$right->delete();
				}
				
			}
			if(isset($_POST['rela'])){
				$db = get_db();
				$db->execute("delete from fb_position_relation where type='{$_POST['rela']}' and news_id={$_POST['del_id']}");
			}
			$post -> delete($_POST['del_id']);
			echo $_POST['del_id'];
		
	}
	elseif("edit"==$_POST['post_type'])
	{
		if($_POST['id']!='')$post -> find($_POST['id']);
		$post -> update_attributes($_POST['post']);
		redirect($_POST['url']);
		
	}
	elseif("edit_priority"==$_POST['post_type'])
	{
		$id_str=explode("|",$_POST['id_str']); 
		$priority_str=explode("|",$_POST['priority_str']); 
		$id_str_num=sizeof($id_str)-1;
		if($_POST['is_dept_list']=='true'){
			$priority = 'dept_priority';
		}else{
			$priority = 'priority';
		}
		for($i=$id_str_num-1;$i>=0;$i--)
		{
			if($priority_str[$i]==""){$priority_str[$i]="100";}
			$db = get_db();
			$sql="update ".$_POST['db_table']." set ".$priority."=".$priority_str[$i]." where id=".$id_str[$i];
			$db->execute($sql);
		}
	}
	elseif("revocation"==$_POST['post_type'])
	{
		if($_POST['id']!='')$post->find($_POST['id']);
		$post->update_attribute("is_adopt","0");
	}
	elseif("publish"==$_POST['post_type'])
	{
		if($_POST['id']!='')$post->find($_POST['id']);
		$post->update_attribute("is_adopt","1");
	}
	elseif("set_up"==$_POST['post_type'])
	{
		if($_POST['id']!='')$post->find($_POST['id']);
		$post->update_attribute("set_up","1");
	}
	elseif("set_down"==$_POST['post_type'])
	{
		if($_POST['id']!='')$post->find($_POST['id']);
		$post->update_attribute("set_up","0");
	}
	elseif("rights"==$_POST['type'])
	{
		$db = get_db();
		$sql = "update xunao_user set rights='".$_POST['rights']."' where id='".$_POST['id']."'";
		$db -> execute($sql);
		
		echo "ok";
	}
	
?>