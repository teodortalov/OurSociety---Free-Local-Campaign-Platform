<?php
declare(strict_types=1);

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * Default route class used by scopes.
 *
 * Set to DashedRoute for `/urls/with-dashes/in-them`.
 */
Router::defaultRouteClass(DashedRoute::class);

/**
 * Default scope.
 */
Router::scope('/', function (RouteBuilder $routes) {
    $routes->redirect('/', '/index.html');
    $routes->connect('/home', ['controller' => 'Pages', 'action' => 'display', 'home'], ['_name' => 'pages:home']);
    $routes->connect('/forgot', ['controller' => 'Users', 'action' => 'forgot'], ['_name' => 'users:forgot']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login'], ['_name' => 'users:login']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout'], ['_name' => 'users:logout']);
    $routes->connect('/profile/edit', ['controller' => 'Users', 'action' => 'edit'], ['_name' => 'users:edit']);
    $routes->connect('/profile', ['controller' => 'Users', 'action' => 'profile'], ['_name' => 'users:profile']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register'], ['_name' => 'users:register']);
    $routes->connect('/reset', ['controller' => 'Users', 'action' => 'reset'], ['_name' => 'users:reset']);
    $routes->connect('/verify', ['controller' => 'Users', 'action' => 'verify'], ['_name' => 'users:verify']);
    $routes->connect('/onboarding', ['controller' => 'Users', 'action' => 'onboarding'], ['_name' => 'users:onboarding']);
    $routes->fallbacks(DashedRoute::class);
    $routes->connect('/*', ['controller' => 'Pages', 'action' => 'display']);
});

/**
 * Citizen prefixed routes.
 *
 * All routes here will have URLs prefixed with `/citizen` and names prefixed with `citizen:`.
 */
Router::prefix('citizen', ['_namePrefix' => 'citizen:'], function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index'], ['_name' => 'dashboard']);
    $routes->connect('/politicians', ['controller' => 'Politicians', 'action' => 'index'], ['_name' => 'politicians']);
    $routes->connect('/politicians/:slug', ['controller' => 'Politicians', 'action' => 'view'], ['_name' => 'politicians:view', 'pass' => ['slug']]);
    $routes->connect('/politicians/:politician/article/:article', ['controller' => 'Articles', 'action' => 'view'], ['_name' => 'politician:article', 'pass' => ['politician', 'article']]);
    $routes->connect('/politicians/:politician/articles', ['controller' => 'Articles', 'action' => 'index'], ['_name' => 'politician:articles', 'pass' => ['politician']]);
    $routes->connect('/questions', ['controller' => 'Questions', 'action' => 'index'], ['_name' => 'questions']);
    $routes->connect('/values/:politician', ['controller' => 'Topics', 'action' => 'compare'], ['_name' => 'topics:compare', 'pass' => ['politician']]);
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Politician prefixed routes.
 *
 * All routes here will have URLs prefixed with `/politician` and names prefixed with `politician:`.
 */
Router::prefix('politician', ['_namePrefix' => 'politician:'], function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index'], ['_name' => 'dashboard']);
    $routes->connect('/profile', ['controller' => 'Politicians', 'action' => 'view'], ['_name' => 'profile']);
    $routes->connect('/profile/articles', ['controller' => 'Articles', 'action' => 'index'], ['_name' => 'profile:articles']);
    $routes->connect('/profile/awards', ['controller' => 'Awards', 'action' => 'index'], ['_name' => 'profile:awards']);
    $routes->connect('/profile/edit', ['controller' => 'Politicians', 'action' => 'edit'], ['_name' => 'profile:edit']);
    $routes->connect('/profile/positions', ['controller' => 'Positions', 'action' => 'index'], ['_name' => 'profile:positions']);
    $routes->connect('/profile/qualifications', ['controller' => 'Qualifications', 'action' => 'index'], ['_name' => 'profile:qualifications']);
    $routes->connect('/profile/videos', ['controller' => 'Videos', 'action' => 'index'], ['_name' => 'profile:videos']);
    $routes->connect('/questions', ['controller' => 'Questions', 'action' => 'index'], ['_name' => 'questions']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register'], ['_name' => 'register']);
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Admin prefixed routes.
 *
 * All routes here will have URLs prefixed with `/admin` and names prefixed with `admin:`.
 */
Router::prefix('admin', ['_namePrefix' => 'admin:'], function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index'], ['_name' => 'dashboard']);
    $routes->connect('/questions', ['controller' => 'Questions', 'action' => 'index'], ['_name' => 'questions']);
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Plugin routes.
 *
 * Uncomment if you use `Plugin::load(..., ['routes' => true])` in `bootstrap.php`,
 * otherwise leave commented out for performance and security.
 */
//\Cake\Core\Plugin::routes();