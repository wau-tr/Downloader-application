## Initial description

You need to develop a web-application which will download particular resource by specified url. The same resources can be downloaded multiple times.
Url can be passed via web API method or with CLI command.
There should be a simple html page showing status of all jobs (for complete jobs there also should be an url to download target file). The same should be available via CLI command and web API.
It should save downloaded urls in storage configured in Laravel (local driver can be used). 

## Initial Requirements

- Laravel 5
- PHP 7
- any SQL DB


## Acceptance Criteria

- should use DB to persist task information
- should use job queue to download resources
- should use Laravel storage to store downloaded resources
- REST API method / CLI command / web page to enqueue url to download
- REST API method / CLI command / web page to view list of download tasks with statuses (pending/downloading/complete/error) and ability to download resource for completed tasks (url to resource in Laravel storage)
- unit tests
- no paging nor css is required for html page
- no authentication/authorization (no separation by users)


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
