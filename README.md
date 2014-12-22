Lionframe - Rapid REST API Development
======================================

Welcome to the Lionframe - Rapid REST API development framework, based on [Symfony](http://symfony.com) & [Sylius](http://sylius.org).

1) Installing Lionframe
-----------------------

When it comes to installing the Lionframe, you should use Composer.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Lionframe application:

    php composer.phar create-project lakion/lionframe path/to/install

Composer will install Lionframe and all its dependencies under the
`path/to/install` directory.

If you encounter any problem with installing the dependencies, just go to project root and run the following command:

    php composer.phar install

2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

3) Getting started with Lionframe
---------------------------------

This distribution is meant to be the starting point for your applications with powerful REST API.

You can move onto reading the official [Lionframe documentation][1].

Enjoy!

[1]:  http://lakion.com/lionframe
