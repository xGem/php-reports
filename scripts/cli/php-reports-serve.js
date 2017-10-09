
// Servir Oasis y watcher
// PHP builtin server: php -S localhost:8000 -t htdocs
// APACHE: httpd

var program = require('commander');
const spawn = require('child_process').spawn;

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
         case 'php':
            //./vendors/php/php -c ./config/php.ini -S localhost:8000 -t htdocs
            console.log('Running PHP server on http://localhost:8000...');
            ls = spawn('./vendors/php/php', ['-c', './scripts/config/php.ini', '-S', 'localhost:8000', '-t', 'www']);
            break;
         default:
            console.log('option "' + [cmdValue] + '" not soported', cmdValue)
            break;
     }



ls.stdout.on('data', (data) => {
  console.log(`stdout: ${data}`);
});

ls.stderr.on('data', (data) => {
  console.log(`stderr: ${data}`);
});

ls.on('close', (code) => {
  console.log(`child process exited with code ${code}`);
});
