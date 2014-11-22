#!/usr/bin/python

import xml.etree.cElementTree as ET

tree = ET.parse('data.xml')
print(tree.getroot())
