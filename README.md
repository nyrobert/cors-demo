# CORS demo

[CORS](http://www.w3.org/TR/cors) demo with [Slim](http://www.slimframework.com) framework (PHP) and [jQuery](http://jquery.com).

## Requirements

* [Docker](https://www.docker.com/)

## Installation

1. Boot the Docker containers:
  
  ```shell
  docker-compose up -d
  ```

2. Download [Composer](https://getcomposer.org/download):
  

3. Download dependencies with Composer

  ```shell
  docker-compose run --rm --entrypoint php -w /var/www php composer.phar install
  ```

4. Download front-end dependencies via Bower:

  ```shell
  docker-compose run js-tools bower install
  ```

## Usage

Navigate to http://127.0.0.1, where you’ll see the application running.
You can call HTTPS and CORS enabled ajax urls from the HTTP-loaded main page.

## Testing

Run JSHint checks:

```shell
  docker-compose run js-tools jshint js
```

Run JSCS checks:

```shell
  docker-compose run js-tools jscs js
```

## License

This project is licensed under the terms of the [MIT License (MIT)](LICENSE).
