// core
var fs = require('fs');

// from npm
var superagent = require('superagent');

// open the output file
var outStream = fs.createWriteStream('optimised.jpg');

// do the request
var req = superagent
    .post('http://jpgoptimiser.com/optimise')
    .attach('input', 'filename.jpg')
;

// save the returned file
req.end(function(res) {
    res.pipe(outStream);
});