# WordPress-Error-Reporting
WordPress Plugin to granularly set the level of error reporting

## Installation
1. [Download the latest release](https://github.com/volkerschulz/WordPress-Error-Reporting/releases)
2. Unpack
3. Copy directory `error-reporting` to `wp-content/plugins/` within your WordPress installation
4. Done

## Usage

Activate / deactivate plugin to switch between the custom error level set and WordPress' default. Find the settings in `Settings / Error Reporting`.

The custom error level will be set **after** the WordPress core has been loaded, but **before** any plugins or themes.

The plugin, if activated, will override the error level only. Make sure to additionally set the [WordPress debug options](https://wordpress.org/documentation/article/debugging-in-wordpress/) to your liking.

## Contributing

PR are welcome against the [develop branch](https://github.com/volkerschulz/WordPress-Error-Reporting/tree/develop) of this project.

## Credits

Special Thanks to [NRTRX](https://wordpress.stackexchange.com/users/62948/nrtrx) for the idea with the MU plugin and to [CK MacLeod](https://stackoverflow.com/users/3692443/ck-macleod) for pointing that out [here](https://stackoverflow.com/questions/77336959/disable-wordpress-php-deprecated-messages-from-debug-log/77340500#comment136411953_77336959).

## Security

If you discover a security vulnerability within this package, please send an email to security@volkerschulz.de. All security vulnerabilities will be promptly addressed. Please do not disclose security-related issues publicly until a fix has been announced. 

## License

This package is made available under the GNU GENERAL PUBLIC LICENSE Version 3 License (GPL-3.0). Please see [License File](LICENSE) for more information.