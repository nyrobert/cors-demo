# CORS demo

[CORS](http://www.w3.org/TR/cors) demo with [Slim](http://www.slimframework.com) framework (PHP) and [jQuery](http://jquery.com).

## Requirements

* [Docker](https://www.docker.com/)

## Installation

1. Boot the Docker containers:
  
  ```shell
  docker-compose up -d
  ```

2. Download [Composer](https://getcomposer.org/download)
  

3. Download dependencies with Composer:

  ```shell
  docker-compose run --rm -w /var/www --entrypoint php php composer.phar install
  ```

4. Download front-end dependencies with Bower:

  ```shell
  docker run --rm -it -v `pwd`:/var/www -w /var/www nyrobert/js-tools bower install
  ```

## Usage

Navigate to http://localhost:8080, where you’ll see the application running.
You can call HTTPS and CORS enabled AJAX urls from the HTTP-loaded main page.

## Testing

Run JSHint checks:

```shell
  docker run --rm -it -v `pwd`:/var/www -w /var/www nyrobert/js-tools jshint js
```

Run JSCS checks:

```shell
  docker run --rm -it -v `pwd`:/var/www -w /var/www nyrobert/js-tools jscs js
```

## License

This project is licensed under the terms of the [MIT License (MIT)](LICENSE).
