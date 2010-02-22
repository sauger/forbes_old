require 'mysql'
my = Mysql.connect('localhost','root','xunao','forbes')
riches=Array.new
ids = Array.new
my.query("select id, name from fb_fh").each do |id, name| 
	gs_ids = Array.new
	my.query("select gs_id from fb_fh_gs where fh_id=#{id}").each do |gs_id|
		gs_ids << gs_id
	end
	my.query("select sum(a.dqgj*b.rate) from fb_gs a left join fb_currency b on a.hbid = b.id where a.id in(#{gs_ids.join(',')})").each do |count|
		p count
	end
	riches << [id,name]
end
puts riches.length
