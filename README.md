# To-Do List Plugin

Simple backend To-Do List plugin. It allows to create tasks list for each backend user.

Plugin page: https://octobercms.com/plugin/renatio-todos

> This plugin requires **Stable** version of OctoberCMS.

## Features
* Manage lists and tasks
* Lists of tasks belongs to backend user
* Task reminder email

## Support

Please use [GitHub Issues Page](https://github.com/mplodowski/oc-todos-plugin/issues) to report any issues with plugin.

> Reviews should not be used for getting support, if you need support please use the Plugin support link.

## Like this plugin?
If you like this plugin, give this plugin a Like or Make donation with PayPal.

# Documentation
## [Installation](#installation) {#installation}

In order to install this plugin you have to click on __Add to project__ or type __Renatio.Todos__ in Backend *System > Updates > Install Plugin*

## [Configuration](#configuration) {#configuration}
This plugin relies on the system schedule process for sending reminder emails. You should ensure that your [cron table is configured correctly](http://octobercms.com/docs/help/installation#crontab-setup) for this plugin to work.

## [Using](#using) {#using}

Plugin will register menu item called **To-Do List**, which allow you to manage lists and tasks.

For each task you can set reminder at column. This will send reminder email to user at given time.

Each backend user has his own lists.

## [Mail template](#mail-template) {#mail-template}

Plugin will register reminder email template. You can customize it in Mail Templates Settings.

If you want to have simple responsive layout for this template than check this path `/plugins/renatio/todos/views/layout` and add it manually.

## [License](#license) {#license}

OctoberCMS To-Do List Plugin is open-sourced software licensed under the MIT license.