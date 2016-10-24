module.exports = function(grunt) {

  // Directorio en donde se encuentran los archivos pug
  var dirPug = "resource/html/pug/";
  // Directorio de destino de los archivos html
  var destPug = "resource/html/html/";
  // Directorio de destino de los archivos html minificados
  var destMinPug = "publication/templates/";
  // Directorio en donde se encuentran los archivos stylus
  var dirStylus = "resource/css/stylus/";
  // Directorio de destino de los archivos css
  var destCss = "resource/css/css/";
  // Directorio de destino de los archivos minificados css
  var destMinCss = "publication/css/";
  // Directorio en donde se encuentran los archivos coffee
  var dirCoffe = "resource/js/coffee/";
  // Directorio de destino de los archivos coffe
  var destCoffe = "resource/js/js/";
  // Directorio donde se guardan los archivos minificados js
  var destMinJs = "publication/js/";

  // Configuración
  grunt.initConfig({
    // Ejecuta acción cuando se actualiza un archivo
    watch: {
      coffee: {
        files: [dirCoffe+'*.coffee'],
        tasks: ['coffee','uglify']
      },
      style: {
        files: [dirStylus+'*.styl',dirStylus+'modules/*.styl'],
        tasks: ['stylus:compile','stylus:compilemin','clean:css']
      },
      pug: {
        files: [dirPug+'*.pug',dirPug+'partials/*.pug'],
        tasks: ['pug']
      }
    },
    // Compila coffee Script
    coffee: {
      glob_to_multiple: {
        expand: true,
        flatten: true,
        cwd: dirCoffe,
        src: ['*.coffee'],
        dest: destCoffe,
        ext: '.js'
      }
    },
    // Minifica js
    uglify: {
      compile: {
        options: {
          sourceMap: true,
          sourceMapIncludeSources: false,
          sourceMapRoot: destMinJs
        },
        files: [{
          expand: true,
          cwd: destCoffe,
          src: '*.js',
          dest: destMinJs,
          ext: '.min.js'
        }]
      }
    },
    // Compila stylus
    stylus: {
      compile: {
        options: {
          compress: false
        },
        files: [{
          expand: true,
          cwd: dirStylus,
          src: '*.styl',
          dest: destCss,
          ext: '.css'
        }]
      },
      compilemin: {
        options: {
          compress: true,
          sourcemap:{
            inline: true
          }
        },
        files: [{
          expand: true,
          cwd: dirStylus,
          src: '*.styl',
          dest: destMinCss,
          ext: '.min.css'
        }]
      }
    },
    // Pug
    pug: {
      compile: {
        options: {
          pretty: true
        },
        files: [{
          expand: true,
          cwd: dirPug,
          src: '*.pug',
          dest: destPug,
          ext: '.html'
        }]
      },
      compilemin: {
        files: [{
          expand: true,
          cwd: dirPug,
          src: '*.pug',
          dest: destMinPug,
          ext: '.html'
        }]
      }
    },
    // Clean
    clean: {
      css: [destMinCss+'*.css.map'],
    }
  });
  
  // Pug || Jade - Template Html
  grunt.loadNpmTasks('grunt-contrib-pug');
  // Stylus - Css
  grunt.loadNpmTasks('grunt-contrib-stylus');
  // Stylus - Css Map
  grunt.loadNpmTasks('grunt-stylus-map');
  // Minificar - Js
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // Coffee Script - Js
  grunt.loadNpmTasks('grunt-contrib-coffee');
  // Ejecuta acción cuando se guarda un archivo
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Borra archivos
  grunt.loadNpmTasks('grunt-contrib-clean');
  // Corre comando de consola
  grunt.loadNpmTasks('grunt-run');
  // Task por defecto watch
  grunt.registerTask('default', ['watch']);

};