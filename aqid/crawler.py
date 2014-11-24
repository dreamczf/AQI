#!/usr/bin/env python3

import xml.etree.ElementTree as ET

tree = ET.parse('hebei.day.xml')

result = tree.getroot()
system = result[0]
citys = result[1]

def process_pointer(pointer):
	for child in pointer:
		print(child.tag, child.text)	

def process_pointers(pointers):
	for pointer in pointers:
		process_pointer(pointer)

def process_city(city):
	for child in city:
		if child.tag == 'Pointers':
			process_pointers(child)
		else:
			print(child.tag, child.text)	

for child in system:
	print(child.tag, child.text)

for city in citys.findall('City'):
	process_city(city)
