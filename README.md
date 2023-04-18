# Remote Dashboard Notifications WordPress Client
[![PHP Version Require](http://poser.pugx.org/niloys7/remote-admin-notification-client/require/php)](https://packagist.org/packages/niloys7/remote-admin-notification-client)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)

## How it works

The plugin is meant to manage messages for multiple products. We call _channels_ the different types of notifications. For instance, if I have 2 products, Product A and Product B, I will create 2 channels in the server: Channel A and Channel B.

Once a channel is created, the plugin will create an ID and a key used to authenticate the client requests. When integrating RDN to a theme or plugin, the client class will be instanciated with the desired channel ID and key.

When a client site will will check for new notifications, it will make an HTTP request (using WordPress HTTP API) to the server. If the requested channel exists and the key is valid, the server will return the latest notification (if any) in a JSON encoded array.

The client site will then cache this response and display it as an admin notice in the WordPress site dashboard until the user dismisses it.

## Integration in a theme or plugin

#### Prerequisite

The following has to be understood before you can integrate this feature in your product:

* **Server**: the WordPress site where the plugin is installed
* **Client**: the WordPress site where the class in instantiated (through a theme or a plugin)

### Integration steps

Run `composer require niloys7/remote-admin-notification-client dev-main`

Alternatively, clone or download this repo into the `inc/` folder in your plugin, and include/require the `class-remote-notification-client.php;` file like so

```php
require_once 'class-remote-notification-client.php';

```

or let Composer's autoloader do the work.


It is really easy to integrate this feature in a plugin or theme. Only four steps are required:

1. Create a new channel on the server
2. Get the channel ID & key (in the term edit screen)
3. Register the notification on the client with the server's URL (`http://domain.com`), the channel ID and key



```php
/**

* @since 1.0
*
* @param int    $channel_id  Channel ID on the remote server
* @param string $channel_key Channel key for authentication with the server
* @param string $server      Notification server URL
* @param int    $cache       Cache lifetime (in hours)
*
* @return bool|string
*/
NS7_RDNC::instance()->add_notification( 72, 'a9873a6e608e946e', 'https://www.codeixer.com' );
```

