#!/usr/bin/python

import xml.etree.cElementTree as ET

tree = ET.ElementTree(file='hebei.xml')
root = tree.getroot()

for elem in tree.iter():
	print(elem.tag, elem.attrib)
