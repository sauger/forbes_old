<?php
		$industry_id = "1";
		$sql  = "select t1.* from fb_rich t1 join fb_rich_company t2 on t1.id=t2.rich_id where t2.company_id in(select group_concat(company_id separator ',') from fb_company_industry where industry_id=$industry_id)";
		$rich = $db->query($sql);
		if($db->record_count>0){
	?>
	<div id="r_t_title">
		<div id=wz>行业富豪</div>
	</div>
	<div class="right_box">
		<?php
			for($i=0;$i<count($rich);$i++){
				$money = $db->query("select * from fb_rich_fortune where rich_id={$rich[$i]->id} order by fortune_year desc limit 1");
				$company = $db->query("select t2.name,t2.id from fb_rich_company t1 join fb_company t2 on t1.company_id=t2.id where t1.rich_id={$rich[$i]->id}");
				$com_count = count($company);
				if($db->record_count>0){
					$ind_ids = $company[0]->id;
					if(count($ind_ids)>1){
						for($k=1;$k<count($company);$k++){
							$ind_ids .= ','.$company[$k]->id;
						}
					}
					$industry = $db->query("select t2.id,t2.name from fb_company_industry t1 join fb_industry t2 on t1.industry_id=t2.id where t1.company_id in ({$ind_ids}) group by name");
					$ind_count = count($industry);
				}else{
					$ind_count = 0;
				}
		?>
		<div class="rich_content" <?php if($i==count($rich)-1){?>style="border:0;"<?php }?>>
			<div class="rich_box">
				<div class="rich_pic"><img src="<?php echo $rich[$i]->image;?>" width="70" height="70"></div>
				<div class="rich_info">
					<div class="rich_name"><a href="/rich/rich.php?id=<?php echo $rich[$i]->id;?>"><?php echo $rich[$i]->name;?></a> <?php if($rich[$i]->gender==1)echo '男';elseif($rich[$i]->xb==0)echo '女';?> <?php if($rich[$i]->birthday!='')echo (date('Y')-$rich[$i]->birthday).'岁'?></div>
					<div class="rich_com"><?php for($j=0;$j<$com_count;$j++){if($j!=0)echo ',';?><a class="style1" href="company.php?id=<?php echo $company[$j]->id;?>"><?php echo $company[$j]->name;?></a><?php }?></div>
					<div class="rich_ind">（<?php for($j=0;$j<$ind_count;$j++){if($j!=0)echo ',';?><a class="style2" href="industry.php?id=<?php echo $industry[$j]->id;?>"><?php echo $industry[$j]->name;?></a><?php }?>）</div>
					<div class="rich_rank">
						年度排名：<span class="red"><?php echo $money[0]->fortune_order;?></span>　今日排名：<span class="red"></span><br/>
						个人财富：<?php echo $money[0]->fortune;?>亿
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="bottom_line"></div>
	<?php }?>