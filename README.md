# Rebrandly API client

Easily use the [API](https://developers.rebrandly.com/) of the url shortener [Rebrandly](https://rebrandly.com/).

## Requirements

This packages requires PHP 7.4+.

## Installation

This package can be used in any PHP project or with any framework. The packages is tested in PHP 7.4.

You can install the package via composer:

```
composer require vdhicts/rebrandly-api-client
```

## Usage

This package tries to offer you a complete implementation of the Rebrandly API. Some endpoints are restricted to certain
plans Rebrandly offer (like scripts and tags).

### Quick usage

All endpoints can be retrieved from the `Rebrandly` class. This class needs the `Client`.

```php
use Vdhicts\Rebrandly;

// Initialize the client and the Rebrandly instance
$client = new Rebrandly\Client('API_KEY');
$rebrandly = new Rebrandly\Rebrandly($client);

// Access the endpoints
$linksEndpoint = $rebrandly->links();
```

For example, to retrieve all links:

```php
$links = $rebrandly->links()->list();
```

### Options

Some endpoints of the Rebrandly API offer some filtering. Those filters can be set in the `Options` class. For example, 
to order your links by clicks:

```php
$links = $rebrandly->links()->list(new Options(['orderBy' => 'clicks', 'orderDir' => 'asc']));
```

### Models

This client will always return the related models. When creating a new resource, the object is provided to the `create`
method. For example, to create a link:

```php
$link = new Rebrandly\Models\Link();
$link->setDestination('https://time-tracker.vdhicts.nl');
$link->setSlashtag('time-tracker');
$link->setDomain($domain);

$rebrandly->links()->create($link);
```

To create a link for you custom domain, you need to specify the domain in the `Link` model:

```php
$domain = new Rebrandly\Models\Domain();
$domain->setFullName('yourdomain.tld');

$link->setDomain($domain);

$rebrandly->links()->create($link);
```

### Exceptions

When something goes wrong, the client will throw a `RebrandlyException`. If you want to catch exceptions from this 
package, that's the one you should catch. Error responses from the API also result in the `RebrandlyException`.

### Laravel

For Laravel users, I would suggest adding the api key to your `.env` file:

`REBRANDLY_API_KEY="your-key"`

And create a config file for Rebrandly or add this to your project's config file. Then initialize the client with the
config value:

```php
$client = new Rebrandly\Client(config('rebrandly.api_key'));
```

## Tests

Unit tests are available in the `tests` folder. Run via phpunit:

`vendor\bin\phpunit`

By default a coverage report will be generated in the `build/coverage` folder.

## Contribution

Any contribution is welcome, but it should meet the PSR-2 standard and please create one pull request per feature. In 
exchange you will be credited as contributor on this page.

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email security@vdhicts.nl 
instead of using the issue tracker.

## License

This package is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Support

This package isn't an official package from Rebrandly, so they probably won't offer support for it. If you encounter a 
problem with this client, please open an issue on GitHub.

## About vdhicts

[Vdhicts](https://www.vdhicts.nl) is the name of my personal company. Vdhicts develops and implements IT solutions for 
businesses and educational institutions.
