# Welcome to the PHP MVC framework

## Starting an application using this framework

1. First, download the framework, either directly or by cloning the repo.
1. Run **composer update** to install the project dependencies.
1. Configure your web server to have the **public** folder as the web root.
1. Open [App/Config.php](App/Config.php) and enter your database configuration data.
1. Create routes, add controllers, views and models.

See below for more details.

## Configuration

Configuration settings are stored in the [App/Config.php](App/Config.php) class. Default settings include database connection data and a setting to show or hide error detail. You can access the settings in your code like this: `Config::DB_HOST`. You can add your own configuration settings in here.

## Routing

The [Router](Core/Router.php) translates URLs into controllers and actions. Routes are added in the [front controller](public/index.php). A sample home route is included that routes to the `index` action in the [Home controller](App/Controllers/Home.php).

Routes are added with the `add` method. You can add fixed URL routes, and specify the controller and action, like this:

```php
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts/index', ['controller' => 'Posts', 'action' => 'index']);
```

