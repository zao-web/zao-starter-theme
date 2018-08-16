Zao Starter Theme
=====================

## Dependencies

1. [Node & NPM](https://www.npmjs.com/get-npm) - Build packages and 3rd party dependencies are managed through NPM, so you will need that installed globally
2. [Gulp](https://gulpjs.com/) - Gulp is used as the main task runner, it runs PostCSS, processes images, handles SVG sprites (if needed), and executes Webpack
3. [Webpack](https://webpack.js.org/) - Webpack is used to process the JavaScript
4. [Composer](https://getcomposer.org/) - Composer is used to manage PHP.

## Getting Started

### Direct Install
- Clone the repository
- Rename folder theme-scaffold -> your project's name
- Do case-sensitive search/replace for the following:

	- ZaoStarterTheme
	- ZAO_STARTERTHEME
	- zao-starter-theme
	- ZAO_STARTERTHEME
	- Zao Starter Theme

- `cd` into the theme folder
- run `npm run start`

## NPM Commands

`npm run start` (install dependencies and run initial gulp)

`npm run watch` (watch)

`npm run build` (build all files)

`npm run deploy` (build all files for deploy)

## Composer Commands

`composer lint` (lint PHP files)

`composer lint-fix` (lint PHP files and automatically correct coding standard violations)

## Contributing

We don't know everything! We welcome pull requests and spirited, but respectful, debates. Please contribute via [pull requests on GitHub](https://github.com/10up/theme-scaffold/compare).

1. Fork it!
2. Create your feature branch: `git checkout -b feature/my-new-feature`
3. Commit your changes: `git commit -am 'Added some great feature!'`
4. Push to the branch: `git push origin feature/my-new-feature`
5. Submit a pull request

## Learn more about the default packages used with this project

- [Babel core](https://www.npmjs.com/package/babel-core)
- [Babel eslint](https://www.npmjs.com/package/babel-eslint)
- [Babel loader](https://www.npmjs.com/package/babel-loader)
- [Babel preset env](https://www.npmjs.com/package/babel-preset-env)
- [Can I Use DB](https://www.npmjs.com/package/caniuse-db)
- [Del](https://www.npmjs.com/package/del)
- [Eslint](https://www.npmjs.com/package/eslint)
- [Eslint loader](https://www.npmjs.com/package/eslint-loader)
- [Gulp](https://www.npmjs.com/package/gulp)
- [Gulp CSSNano](https://www.npmjs.com/package/gulp-cssnano)
- [Gulp filter](https://www.npmjs.com/package/gulp-filter)
- [Gulp Live Reload](https://www.npmjs.com/package/gulp-livereload)
- [Gulp PostCSS](https://www.npmjs.com/package/gulp-postcss)
- [Gulp Rename](https://www.npmjs.com/package/gulp-rename)
- [Gulp Sourcemaps](https://www.npmjs.com/package/gulp-sourcemaps)
- [PostCSS CSSNext](https://www.npmjs.com/package/gulp-postcss)
- [PostCSS Import](https://www.npmjs.com/package/postcss-import)
- [Pump](https://www.npmjs.com/package/pump)
- [Require DIR](https://www.npmjs.com/package/require-dir)
- [Run Sequence](https://www.npmjs.com/package/run-sequence)
- [Webpack](https://www.npmjs.com/package/webpack)
- [Webpack CLI](https://www.npmjs.com/package/webpack-cli)
- [Webpack Stream](https://www.npmjs.com/package/webpack-stream)
- [Husky@next](https://www.npmjs.com/package/husky)
- [Lint Staged](https://www.npmjs.com/package/lint-staged)
- [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)
