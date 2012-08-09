# Ajax Notification

An example plugin used to demonstrate the WordPress Ajax API for a companion article on Envato's WPTuts+ site.

## Features

1. When the plugin is activated, a notification message will appear.
2. The message will appear throughout the time the plugin is active.
3. If the user clicks on the 'dismiss' anchor, the message will disappear.
4. If the user deactivates the plugin, the message will disappear.

## How It Works

* Upon activation, the plugin adds an option to the options table used to track whether or not the user wishes to display the message.
* When the user clicks on the 'dismiss' anchor, a request is sent to the server via Ajax.
* The option created during activation is set to false to hide the message.
* The message will fade out.
* When the user deactivates the plugin, the data is erased from the database and the process will repeat on activation.

## Changelog

_1.0 (August 8th, 2012)_

* Completing Ajax functionality

_0.1 (August 7th, 2012)_

* Initial release. Static functionality only - no Ajax.