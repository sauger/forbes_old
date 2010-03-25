require 'mysql'
p "start to update the dynamic fortune list >>>>>>>"
my = Mysql.connect('192.168.1.4', 'forbes_db','xunao','forbes')
stmt = my.prepare("delete from fb_dynamic_fortune_list")
stmt.execute
index = 0
my.query("select d.id,d.name,sum(a.stock_value*c.rate*b.stock_count*100) as fortune from fb_company a right join fb_rich_company b on a.id = b.company_id left join fb_currency c on a.hbid= c.id left join fb_rich d on b.rich_id = d.id group by b.rich_id order by fortune desc").each do |id, name, count| 
	index += 1	
	last_index = 0	
	if index <= 100
		my.query("select current_index from fb_dynamic_fortune_history where richer_id = #{id} order by regdate desc limit 1").each do |last|
			last_index = last.to_s
		end
		stmt = my.prepare("insert into fb_dynamic_fortune_list (richer_id,current_index,last_index,name,fortune,regdate) values (?,?,?,?,?,NOW())")
		stmt.execute id,index,last_index,name,count
	end
	stmt = my.prepare("insert into fb_dynamic_fortune_history (richer_id,current_index,name,fortune,regdate) values (?,?,?,?,NOW())")
	stmt.execute id,index,name,count
	stmt = my.prepare("update fb_rich set current_fortune_order=? where id=?")
	stmt.execute index,id
end
p "finish the update! totle count: #{index}"
my.close
