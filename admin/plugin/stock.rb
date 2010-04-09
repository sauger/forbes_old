require 'net/http'
require 'uri'
require 'mysql'
#get the compay code need to query
p 'Starting the task'
my = Mysql.connect('192.168.1.4','forbes_db','xunao','forbes')
my.query('select id, stock_code,stock_place_code from fb_company').each do |id,ssdm,jys|
        #puts id.to_s + ';' + ssdm +';' + jys
	ssdm = ssdm + '.' + jys if jys
	p ssdm
        url = URI.parse('http://download.finance.yahoo.com/d/quotes.csv?s='+ssdm+'&f=sl1d1t1c1ohgv&e=.csv');
        res = Net::HTTP.get(url)
        res = res.split(',')
        puts res[1]
        stmt = my.prepare('update fb_company set stock_value=? where id=?')
        stmt.execute res[1], id 
end
my.close
require "updatedb.rb"
