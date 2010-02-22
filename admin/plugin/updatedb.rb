require 'mysql'
p "start to update the dynamic fortune list >>>>>>>"
my = Mysql.connect('localhost','root','xunao','forbes')
stmt = my.prepare("delete from fb_dynamic_fortune_list")
stmt.execute
index = 0
my.query("select d.id,d.name,sum(a.dqgj*c.rate*b.stock_count) as fortune from fb_gs a right join fb_fh_gs b on a.id = b.gs_id left join fb_currency c on a.hbid= c.id left join fb_fh d on b.fh_id = d.id group by b.fh_id order by fortune desc").each do |id, name, count| 
	index += 1	
	last_index = 0	
	if index <= 100
		my.query("select current_index from fb_dynamic_fortune_history where richer_id = #{id} order by reg_date desc limit 1").each do |last|
			last_index = last.to_s
		end
		stmt = my.prepare("insert into fb_dynamic_fortune_list (richer_id,current_index,last_index,name,fortune,regdate) values (?,?,?,?,?,NOW())")
		stmt.execute id,index,last_index,name,count
	end
	stmt = my.prepare("insert into fb_dynamic_fortune_history (richer_id,current_index,name,fortune,reg_date) values (?,?,?,?,NOW())")
	stmt.execute id,index,name,count
end
p "finish the update! totle count: #{index}"