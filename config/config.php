<?php

/**
 * Bono App Configuration
 *
 * @category  PHP_Framework
 * @package   Bono
 * @author    Ganesha <reekoheek@gmail.com>
 * @copyright 2013 PT Sagara Xinix Solusitama
 * @license   https://raw.github.com/xinix-technology/bono/master/LICENSE MIT
 * @version   0.10.0
 * @link      http://xinix.co.id/products/bono
 */

use Norm\Schema\String;
use Norm\Schema\Password;

return array(
    'application' => array(
        'title' => 'Xinix Showcase',
        'subtitle' => 'A Comfy Place to Show Your Case',
    ),
    'bono.salt' => 'please change this',
    'bono.providers' => array(
        '\\Norm\\Provider\\NormProvider' => array(
            'datasources' => array(
                'mongo' => array(
                    'driver' => '\\Norm\\Connection\\MongoConnection',
                    'database' => 'showcase',
                ),
            ),
            'collections' => array(
                'mapping' => array(
                    'User' => array(
                        'schema' => array(
                            'username' => String::create('username')->filter('trim|required|unique:User,username'),
                            'password' => Password::create('password')->filter('trim|confirmed|salt'),
                            'email' => String::create('email')->filter('trim|required|unique:User,email'),
                            'first_name' => String::create('first_name')->filter('trim|required'),
                            'last_name' => String::create('last_name')->filter('trim|required'),
                        ),
                    ),
                    'Git' => array(
                        'schema' => array(
                            'git' => String::create('git')->filter('trim|required'),
                            'author' => String::create('author')->set('hidden', true),
                            'repo' => String::create('repo')->set('hidden', true),
                            'description' => String::create('description')->set('hidden', true),
                            'fork' => String::create('fork')->set('hidden', true),
                            'star' => String::create('star')->set('hidden', true),
                            'version' => String::create('version')->set('hidden', true),
                            'readme' => String::create('readme')->set('hidden', true),
                        ),
                    ),
                ),
            ),
        ),
        '\\Xinix\\Migrate\\Provider\\MigrateProvider' => array(
            // 'token' => 'changetokenherebeforeenable',
        ),
        '\\App\\Provider\\AppProvider',
    ),
    'bono.middlewares' => array(
        '\\Bono\\Middleware\\ControllerMiddleware' => array(
            'default' => '\\Norm\\Controller\\NormController',
            'mapping' => array(
                '/user' => null,
                '/git'  => '\\App\\Controller\\GitController',
                '/menu' => null,
            ),
        ),
        '\\Bono\\Middleware\\ContentNegotiatorMiddleware' => array(
            'extensions' => array(
                'json' => 'application/json',
            ),
            'views' => array(
                'application/json' => '\\Bono\\View\\JsonView',
            ),
        ),
        // uncomment below to enable auth
        // '\\ROH\\BonoAuth\\Middleware\\AuthMiddleware' => array(
        //     'driver' => '\\ROH\\BonoAuth\\Driver\\NormAuth',
        // ),
        '\\Bono\\Middleware\\NotificationMiddleware' => null,
        '\\Bono\\Middleware\\SessionMiddleware' => null,
    ),
    'bono.theme' => array(
        'class' => '\\Xinix\\Theme\\NakedTheme',
        'override' => true,
    )
);
