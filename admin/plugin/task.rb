require 'net/http'
require 'uri'
p "start to update the currency exchage rate"
url = URI.parse('http://localhost/admin/plugin/currency_plugin.php');
res = Net::HTTP.get(url)
p res if !res.empty?
require "stock"
