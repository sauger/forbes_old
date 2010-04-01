			<div id=title>福布斯新闻</div>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($news->category_id);
			?>
			<div id=title1>
				<a href="/">福布斯中文网</a> > 
				<?php
					$len = count($parent_ids);
					for($i=$len-1;$i>=0;$i--){
						$item = $category->find($parent_ids[$i]);
				?>
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a> > 
				<?php
					}
				?>
				<span style="color:#246BB0;"><?php echo strip_tags($news->short_title);?></span>
			</div>
			<div id=line></div>