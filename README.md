![Test](https://github.com/amirmasoud/pepper/workflows/Test/badge.svg?branch=master)

<a href="https://amirmasoud.github.io/docs/">
    <p align="center">
        <img src="https://raw.githubusercontent.com/amirmasoud/docs/master/static/read-the-documentation-button.png" />
    </p>
</a>

Install via composer:

```bash
composer require amirmasoud/pepper
```

Pepper is an automatic GraphQL exposing Laravel package. It uses your application defined models to auto define properties and relations. It supports Query and Mutation out of the box.

features:

- Customizable validation, authentication, and authorization
- Optional JWT support for protecting routes including login, register, forget password and reset password
- Support all Laravel Eloquent databases (SQLite, MySQL, PostgreSQL, SQLServer)

> Please note that this repo is still a work-in-progress project.

## Version support

PHP: 8.1

Laravel: 9.x

## Supported databases

As it uses Laravel Eloquent only, it can support all supported Laravel ORM such as: SQLite, MySQL, PostgreSQL and, SQLServer.

If you discover a security vulnerability within Pepper, please send an e-mail to Amirmasoud Sheydaei via [amirmasoud.sheydaei@gmail.com](mailto:amirmasoud.sheydaei@gmail.com). All security vulnerabilities will be promptly addressed.

## Contributing

### Testing

Run PHPStan:

_analyse_
```bash
composer analyse
```

_test_
```bash
composer test
```

_test-coverage_
```bash
composer test-coverage
```

_format_
```bash
composer format
```

## License

The MIT License (MIT). Please see [License File](LICENSE) File for more information.
