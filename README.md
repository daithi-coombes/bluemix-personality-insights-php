# bluemix-personality-insights-php
A php library to provide API calls &amp; handle authentication with the Bluemix personality insights using PHP

Documentation on the Personality Insights API can be found here: [Rest API Documentation](https://www.ibm.com/smarterplanet/us/en/ibmwatson/developercloud/apis/#!/personality-insights) An example using node: [watson-developer-cloud/personality-insights-nodejs](https://github.com/watson-developer-cloud/personality-insights-nodejs)

# requirements due to dependency
 - [Guzzle restful library](http://guzzle.readthedocs.org/en/latest/overview.html#requirements)
  - PHP 5.4.0
  - To use the PHP stream handler, allow_url_fopen must be enabled in your system’s php.ini.
  - To use the cURL handler, you must have a recent version of cURL >= 7.16.2 compiled with OpenSSL and zlib.


# download code
```bash
git clone https://github.com/daithi-coombes/bluemix-personality-insights-php
```

# run tests
```
cd bluemix-personality-insights-php
composer test
```
