=== bbP Auto Block Spammers ===
Contributors: shanebp
Donate link: https://www.philopress.com/donate/
Author: shanebp
Author URI: https://profiles.wordpress.org/shanebp
Plugin URI: https://philopress.com/
Tags: bbPress, spam, block
Requires at least: 4.0
Tested up to: 5.4
Stable tag: 1.2
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A bbPress plugin that allows moderators to block bbPress spammers

== Description ==

Allow your moderators to block spammers from using the forum.

Moderators can mark Topics and Replies as spam, but they cannot change the forum role of a user.  This plugin allows them to block users without giving moderators additional access to wp-admin.

If a user exceeds the spam limit as set by the 'Spam Limit' field in bbPress Settings, the forum role for that user will be changed to 'Blocked', meaning they can no longer use the forums.  If moderators unspam the posts by a user and the number of spam entries by that user falls below the Spam Limit, then the forum role for that user will be changed to 'Participant'.

Site admins can review and set the number of spam flags, if any, for each user at the bottom of the Edit User screen in wp-admin.

This plugin is very lightweight. It does not manipulate posts. It only fires when a Topic or Reply is marked as spam or unspam.

For more information about this plugin, please visit [bbP Auto Block Spammers](https://www.philopress.com/products/bbp-auto-block-spammers/ "bbP Auto Block Spammers")


== Installation ==

1. Upload the zip on the Plugins > Add screen in wp-admin

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Go to wp-admin > Settings > Forums. Under 'Forum User Settings', find 'Spam Limit', enter a number and Save.  It will default to zero.



== Frequently Asked Questions ==

= Multi-site support =
* Yes. Network activate and then set the Spam Limit on a per blog basis




== Screenshots ==
1. The bbPress settings screen, showing the Spam Limit field


== Changelog ==

= 1.2 =
* Tested in 5.4
* fix php notice re Undefined variable

= 1.1 =
* Tested in 5.0

= 1.0 =
* Initial release.



== Upgrade Notice ==

= 1.2 =
* Tested in 5.4
* fix php notice re Undefined variable

= 1.1 =
* Tested in 5.0

= 1.0 =

