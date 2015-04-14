var system = require('system');
var page = require('webpage').create();

var url = system.args[1];

page.open(url, function(status) {
    var result = {status: status};
    if(status === "success") {
        result.content = page.content;
    }
    console.log(JSON.stringify(result));
    phantom.exit();
});