Install node.js:
    brew install node

Install npm:
    curl http://npmjs.org/install.sh | sh

Install bower:
    npm install -g bower

Install grunt.js:
    npm install -g grunt-cli

If the project bower.json:
    bower install    

Running "bower install" will take care of adding your dependencies.
If it doesn't or doesn't have bower.json... proceed.

If the project already has gruntfile.js:
    npm install
    grunt

The last command "npm install" run:
    npm install grunt --save-dev
    npm install grunt-css --save-dev
