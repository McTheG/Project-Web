var http = require('http');  
var express = require("express");
var bodyparser = require("body-parser");

var url = "http://datasets.antwerpen.be/v4/gis/bbq.json";

function passUrl() { 
  var passedUrl = "http://datasets.antwerpen.be/v4/gis/bbq.json";
  window.location.href = "locations.php?url=" + passedUrl; 
}
	
http.createServer(function(req, res) 
{  
	res.writeHead(200, {
		'Content-Type': 'text/html'
	});
	
	console.log(''+ url +'');
	
	res.write('<!doctype html>\n<html lang="en">\n' + 
    '\n<meta charset="utf-8">\n<title>Test web page on node.js</title>\n' + 
    '<style type="text/css">* {font-family:arial, sans-serif;}</style>\n' + 
    '\n\n<h1>NodeJS Server Page</h1>\n' + 
    '<div id="content"><p>Content:</p><ul><li>None</li></ul></div>' + 
    '\n\n');
	
	res.end();
	
}).listen(8888, '127.0.0.1');
console.log('Server running at http://127.0.0.1:8888');
