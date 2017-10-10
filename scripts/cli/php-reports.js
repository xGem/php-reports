#! /usr/bin/env node

var program = require('commander');

program
    .version('0.0.1')
    .command('add <cmd>','Add [php|db]')
    .command('serve <cmd>','Start web app [php|apache]')
    .command('initdb','Init db')
    .command('restoredb','Restore db')
    .command('startdb','Start db')
    .command('stopdb','Stop db')
    .command('backupdb','Stop db')
    .command('open','start tool [pg|...]')
    .command('run','run tool [phpdoc|...]')
    .parse(process.argv);

if(!program.args.length) {
    program.help();
} else {
    console.log('Keywords: ' + program.args);
}
