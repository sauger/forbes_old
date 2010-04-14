require 'net/http'
require 'uri'
require 'mysql'

dbhost = '192.168.1.4'
dbuser = 'forbes_db'
dbpassword = 'xunao'
dbname = 'forbes'
my = Mysql.connect(dbhost, dbuser, dbpassword ,dbname)
file = File.new('./update_stock',"w+")
i = 0
while true do 
	start = i*200
	sql = "select id, stock_code,stock_place_code from fb_company limit #{start},200"
	items = my.query(sql)
	codes = []
	ids = []
	items.each do |id,ssdm,jys|
		code = ssdm
		code = code + '.' + jys if jys.length > 0 
		codes.push code
		ids.push id
	end

	code = codes.join(',')
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
	j=0
	res.split("\n").each do |lines|
		
		lines.each do |line|
			value = line.split(',')[1]
			if value.nil?
			else
				sql = "update fb_company set stock_value=#{value} where id=#{ids[j]};"
				file.puts sql
			end
		end
		j = j+1
	end
	i = i+1
		if items.num_rows < 200
		break
	end 
	items.free
end
file.close
puts 'start to update'
system "mysql -h#{dbhost} -u#{dbuser} -p#{dbpassword} #{dbname} < update_stock"
puts 'update finish'

require "updatedb.rb"
