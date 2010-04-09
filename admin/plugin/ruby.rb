require 'mysql'
my = Mysql.connect('192.168.1.4','forbes_db','xunao','forbes')
my.query('select id from fb_user').each do |id|
	p id
end
