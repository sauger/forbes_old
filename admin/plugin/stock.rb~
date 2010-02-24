require 'net/http'
require 'uri'
require 'mysql'
#get the compay code need to query
p 'Starting the task'
my = Mysql.connect('localhost', 'root', 'xunao', 'forbes')
my.query('select id, ssdm,jys from fb_gs').each do |id,ssdm,jys|
	#puts id.to_s + ';' + ssdm +';' + jys
	url = URI.parse('http://download.finance.yahoo.com/d/quotes.csv?s='+ssdm+'.'+jys+'&f=sl1d1t1c1ohgv&e=.csv');
	res = Net::HTTP.get(url)
	res = res.split(',')
	puts res[1]
	stmt = my.prepare('update fb_gs set dqgj=? where id=?')
	stmt.execute res[1], id	
end
my.close
require updatedb.rb
