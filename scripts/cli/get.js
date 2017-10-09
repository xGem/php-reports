
var AdmZip = require('adm-zip');
var request = require('request');
var	ProgressBar	= require('progress-bar');

exports.downloadAndUnzip = function (url, folderName) {

    /**
     * Download a file
     *
     * @param url
     */

    var download = function (url) {
        return new Promise(function (resolve, reject) {
            console.log("Downloading..." + url);
            var req = request({
                url: url,
                method: 'GET',
                encoding: null
            }, function (err, response, body) {
                if (err) {
                    return reject(err);
                }
                resolve(body);
            });

            req.on('response', function(res){
              var len = parseInt(res.headers['content-length'], 10);

              console.log('Total:' + len);

              if(!isNaN(res.headers['content-length']))
              {
                var bar = ProgressBar.create(process.stdout);
                var sum = 0;

               res.on('data', function (chunk) {
                 sum = (chunk.length - 0) + (sum - 0);
                 //console.log(sum/len);
                 bar.update(sum/len);
                });
              }

              res.on('end', function () {
                console.log('\n');
              });
            });

        });
    };

    /**
     * Unzip a Buffer
     *
     * @param buffer
     * @returns {Promise}
     */
    var unzip = function (buffer) {
        return new Promise(function (resolve, reject) {
            console.log('Promise Unzip...');
            var resolved = false;

            var zip = new AdmZip(buffer);

            console.log("UnZipping... " + folderName);
            zip.extractAllTo(folderName,true);
            console.log('Saved: ' + folderName);

        });
    };


    return download(url).then(unzip);

};

// Instalar PSQL
