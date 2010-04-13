		<div id=bread>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($news->category_id);
			?>
			<?php
				$len = count($parent_ids);
				for($i=$len-1;$i>=0;$i--){
					$item = $category->find($parent_ids[$i]);
			?>
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a> > 
			<?php }	?>
			<span style="color:#246BB0;"><?php echo strip_tags($news->title);?></span>				
		</div>
		<div id=bread_line></div>