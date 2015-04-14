var system = require('system');
var base64 = require('base-64');
var page = require('webpage').create();

var params = JSON.parse(base64.decode(system.args[1]));

page.customHeaders = params.headers;

page.open(params.url, function(status) {
    var result = {status: status};
    if(status === "success") {
        result.content = page.content;
    }
    console.log(JSON.stringify(result));
    phantom.exit();
});