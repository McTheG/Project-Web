var jsonObj = require("./bbq.json");

var myJson = {'key':'value', 'key2':'value2'};
for(var myKey in myJson) 
{
   console.log("key:"+myKey+", value:"+myJson[myKey]);
}

//var config = require('./test.json');
//console.log(config.id + ' ' + config.objectid + ' ' + config.point_lat + ' ' + config.point_lng + ' ' + config.obj_type + ' ' + config.type + ' ' + config.o_id + ' ' + config.naam + ' ' + config.aantal + ' ' + config.ligging + ' ' + config.orientatie + ' ' + config.status + ' ' + config.shape);