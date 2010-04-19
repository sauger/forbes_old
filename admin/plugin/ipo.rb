#!/usr/bin/ruby
require 'net/http'
require 'uri'
require 'mysql'
require 'time'

dbhost = '192.168.1.4'
dbuser = 'forbes_db'
dbpassword = 'xunao'
dbname = 'forbes'
my = Mysql.connect(dbhost, dbuser, dbpassword ,dbname)
sql = "select stock_code,stock_count,start_time,intval,a.id, b.rate from fb_ipo_info a left join fb_currency b on a.currency_id = b.id where start_time < now() and end_time > now()  limit 1"
path = File.dirname(__FILE__)
file = File.new(path + '/ipo',"a")
time =  Time.new.strftime("%H:%M")
my.query(sql).each do |code,scount,start_time,intval,id,rate|
	url = "http://download.finance.yahoo.com/d/quotes.csv?s=#{code}&f=sl1d1t1c1ohgv&e=.csv"
	url = URI.parse(url);
	fail_count = 0
	while true do
		begin
			res = Net::HTTP.get(url)
			break
		rescue
			fail_count = fail_count + 1
			break if fail_count > 10
			puts 'erro'
		end
	end
	value = res.split(',')[1].to_f * scount.to_i / 100000000 * rate
	file.printf("$ydata[]=%.1f;$xdata[]='%s';",value,time)
	#update the next generate time
	tstart = Time.parse(start_time)
	tstart = tstart + intval.to_i * 60
	stmt = my.prepare("update fb_ipo_info set start_time = ? where id=?")
	stmt.execute tstart,id
end
my.close

file.close
url = URI.parse('http://localhost/admin/plugin/generate_ipo_image.php');
res = Net::HTTP.get(url)
p res if !res.empty?

