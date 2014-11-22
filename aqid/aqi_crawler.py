#!/usr/bin/python

import urllib2
import urllib

base_url = 'http://www.baibai.com'

data = {};
data['from'] = '41ed4055848df4c7feee23eb1675bee4'
url_params = urllib.urlencode(data)

url = base_url + '?' + url_params;

req = urllib2.Request(base_url)
try:
	reponse = urllib2.urlopen(req, None, 5)
	page = reponse.read()
	print page
except urllib2.URLError, e:
	print e.reason
