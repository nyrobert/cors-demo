# CORS demo

[CORS](http://www.w3.org/TR/cors) demo with [Slim](http://www.slimframework.com) framework (PHP) and [jQuery](http://jquery.com).

## Requirements

* [Docker](https://www.docker.com/)

## Installation

1. Download PHP dependencies via Composer:
  
  ```shell
  docker-compose run composer install
  ```

2. Download front-end dependencies via Bower:

  ```shell
  docker-compose run node bower install
  ```

3. Boot the Docker containers:
  
  ```shell
  docker-compose up -d
  ```

## Usage

Navigate to http://127.0.0.1, where you’ll see the application running.
You can call HTTPS and CORS enabled ajax urls from the HTTP-loaded main page.

## License

This project is licensed under the terms of the [MIT License (MIT)](LICENSE).
