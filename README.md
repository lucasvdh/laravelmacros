Laravel 5 Macros
==============

A useful set of HTML and Form macros with corresponding CSS and Javascript resources. Made for Bootstrap.

Check out the 4.0 branch for Laravel 4 support.

Getting started
----------
1. [Include the package in your application](#include-the-package-in-your-application)
2. [Register the service provider](#register-the-service-provider)
3. [Publish the styles and scripts](#publish-the-styles-and-scripts)

Include the package in your application
---------------------------------------

``` bash
$ composer require lucasvdh/laravelmacros:5.*
```
Or add a requirement to your project's composer.json

``` javascript
"require": {
    "lucasvdh/laravelmacros": "5.*"
},
```

Register the service provider
------------------

Edit the `config/app.php` file. Append the following to the `providers` array:

``` php
'Lucasvdh\LaravelMacros\MacroServiceProvider',
```

Publish and include the styles and scripts
-----------------------------

``` bash
$ php artisan vendor:publish
```

The CSS and Javascript files will be published to `public/css` and `public/js`. 

Make sure to include these in the view where you want to use the macros:

``` html
<html>
    <head>
        ...
        <link href="/css/laravel-macros.css" rel="stylesheet">
    </head>
    <body>
        ...
        <!-- Include Javascript at the end of body to improve page load speed -->
        <script src="/js/laravel-macros.js" type="text/javascript"></script>
    </body>
</html>
```

That's it
=========

You can now use the macros and all should work. Customization of the CSS and Javascript files should be straight forward.

Below, a few examples are given how to use these macros:

Examples
--------

Date picker

``` blade
{!! Form::datepicker('field_name', $default, ['class' => 'some-class']) !!}
```

Chosen select

``` blade
{!! Form::chosen('field_name', $is_checked, 'This is the checkbox text', 'value'['class' => 'some-class']) !!}
```


Material checkbox

``` blade
{!! Form::materialCheckbox('field_name', $is_checked, 'This is the checkbox text', 'value'['class' => 'some-class']) !!}
```
