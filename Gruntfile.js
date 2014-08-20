module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
      // sass files get compiled into css files
      compass: {                  // Task
        dist: {                   // Target
          options: {              // Target options
            sassDir: 'scss',
            cssDir: 'css',
            environment: 'production'
          }
        },
       
      },
   
    watch: {
      compass: {
        files: ['**/*.scss'],
        tasks: ['compass']
      }
       
    },
   
  });


  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // grunt.loadNpmTasks('grunt-recess');

  grunt.registerTask('default', ['compass','watch']);

};