# To-Do List Plugin

Simple backend To-Do List plugin. It allows to create tasks list for each backend user.

## Features

* Manage lists and tasks
* Lists of tasks belongs to backend user
* Task reminder email

## Installation

There are couple ways to install this plugin.

1. Use October [Marketplace](http://octobercms.com/help/site/marketplace) and __Add to project__ button.
2. Use October backend area *Settings > System > Updates & Plugins > Install Plugins* and type __Renatio.Todos__.
3. Use `php artisan plugin:install Renatio.Todos` command.
4. Use `composer require renatio/todos-plugin` in project root.

## Configuration

Plugin relies on the system scheduler for sending reminder email. For scheduled tasks to operate correctly, you should configure [Cron entry on your server](http://octobercms.com/docs/help/installation#crontab-setup).

## Using

Plugin will register menu item called **To-Do List**, which allow you to manage lists and tasks.

For each task you can set reminder at column. This will send reminder email to user at given time.

User can see only lists that belongs to him.

## Mail template

Plugin will register reminder email template. You can customize it in *Settings > Mail Templates*.

## Support

Please use [GitHub Issues Page](https://github.com/mplodowski/oc-todos-plugin/issues) to report any issues with plugin.

> Reviews should not be used for getting support or reporting bugs, if you need support please use the Plugin support link.

## Like this plugin?

If you like this plugin, give this plugin a Like or Make donation with [PayPal](https://www.paypal.me/mplodowski).