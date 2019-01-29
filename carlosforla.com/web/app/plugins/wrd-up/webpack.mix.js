const mix       = require('laravel-mix');
const stylelint = require('laravel-mix-stylelint');
const eslint    = require('laravel-mix-eslint');
const cssnano   = require('cssnano');

const url   = 'http://ndncollective.test';
const src   = './resources/assets';
const dist  = './dist';
const lang = './lang';

const externals = {
  'lodash': 'lodash',
  'react': 'React',
  'react-dom': 'ReactDOM',
  '@wordpress/blocks': 'wp.blocks',
  '@wordpress/components': 'wp.components',
  '@wordpress/compose': 'wp.compose',
  '@wordpress/data': 'wp.data',
  '@wordpress/date': 'wp.date',
  '@wordpress/editor': 'wp.editor',
  '@wordpress/element': 'wp.element',
  '@wordpress/hooks': 'wp.hooks',
  '@wordpress/i18n': 'wp.i18n',
  '@wordpress/plugins': 'wp.plugins',
}

// Webpack
mix.webpackConfig({
  externals: externals,
})

// Babel
mix.babelConfig({
  'plugins': [
    [
      '@wordpress/babel-plugin-makepot', {
        'output': `${lang}/wordpress-frontend.pot`
      }
    ],
  ],
})

// Settings
mix.setPublicPath(dist);

// Browsersync
mix.browserSync({
  proxy: `${url}`,
  files: [
    `${dist}/**/*.css`,
    `${dist}/**/*.js`,
  ],
});

// cssnano
cssnanoConfig = {
  preset: [
    'default',
    { discardComments: { removeAll: true } }
  ]
};

// Editor SCSS
mix.sass(`${src}/styles/main.scss`, `${dist}/styles`)
  .options({
    postCss: [
      cssnano({
        cssnanoConfig
      })
    ]
  })
  .stylelint({
    configFile: './.stylelintrc.js',
  });

// Editor JS
mix.react(`${src}/scripts/main.js`, `${dist}/scripts`)
  .eslint({
    fix: false,
    cache: false,
  });

// Admin JS
mix.react(`${src}/scripts/admin.js`, `${dist}/scripts`)
  .eslint({
    fix: false,
    cache: false,
  });

// Source maps when not in production.
if (!mix.inProduction()) {
  mix.sourceMaps();
}

// Hash and version files in production.
if (mix.inProduction()) {
  mix.version()
    .then(() => {
      const manifest = File.find( `${dist}/mix-manifest.json` );
      const json = JSON.parse(manifest.read());
      Object.keys(json).forEach(key => {
        const hashed = json[key];
        delete json[key];
        json[key.replace(/^\/+/g, '')] = hashed.replace(/^\/+/g, '');
      });
      manifest.write(JSON.stringify(json, null, 2));
    });
}