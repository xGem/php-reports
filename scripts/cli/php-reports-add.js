#! /usr/bin/env node


require('dotenv').config();
var get = require('./get');
var program = require('commander');

program
    .version('0.0.1')
    .arguments('<cmd>')
    .action(function (cmd) {
       cmdValue = cmd;
    })
    .parse(process.argv);

if(!program.args.length) {
    program.help();
} else {
    console.log('Keywords: ' + program.args);
}

switch(cmdValue) {
     case 'db':
       get.downloadAndUnzip(process.env.PGSQL_URL, 'vendors/db')
       .then(function (data) {
          console.log(data); // unzipped content
       })
       .catch(function (err) {
          console.error(err);
       });
       break;
     case 'php':
        get.downloadAndUnzip(process.env.PHP_URL, 'vendors/php')
        .then(function (data) {
           console.log(data); // unzipped content
        })
        .catch(function (err) {
           console.error(err);
        });
        break;
    case 'apache':
       get.downloadAndUnzip(process.env.APACHE_URL, 'vendors')
       .then(function (data) {
          console.log(data); // unzipped content
       })
       .catch(function (err) {
          console.error(err);
       });
       break;
   case 'modules':
      get.downloadAndUnzip(process.env.MOD_AUTHNZ_SSPI_URL, 'vendors')
      .then(function (data) {
         console.log(data); // unzipped content
      })
      .catch(function (err) {
         console.error(err);
      });
      break;
    default:
      console.log('option "' + [cmdValue] + '" not soported', cmdValue)
      break;
 }
