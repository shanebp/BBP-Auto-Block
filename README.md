# BBP Auto Block Spammers
## Version 1.0.0

This bbPress plugin allows your moderators to block spammers from using the forum. 

Moderators can mark Topics and Replies as spam, but they cannot change the forum role of a user.  This plugin allows them to block users without giving moderators additional access to wp-admin.  

When a user exceeds the allowable spam items, set the user's forum role to *blocked*, meaning they can no longer use the forums.  If moderators unspam the posts by a user and the number of spam entries by that user falls below the Spam Limit, then the forum role for that user will be changed to *participant*. 

See *Settings > Forum Settings > Spam Limit* to set the number of allowable spam items.<br>
Defaults to 0 - which means that a user's role will be changed to *blocked* the first time their Topic or Reply is marked as spam.

Site admins can review and set the number of spam flags, if any, for each user at the bottom of the Edit User screen in wp-admin.

This plugin is very lightweight. It does not manipulate posts. It only fires when a Topic or Reply is marked as spam or unspam. 


Tested on multisite: Set spam limits and user spam count per blog

The official version of this plugin lives here:
[bbP Auto Block Spammers](https://wordpress.org/plugins/bbp-auto-block-spammers/)