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


## Notes

1. Spent time: 3 hrs. (as I understand it should take about 2 hours)
2. Poor unit tests. 
3. I'd like to store statuses as integer. But I'm not sure that I should make it in this test challenge. 

