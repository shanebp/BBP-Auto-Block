# BBP Auto Block

## Version 0.1.0

When a topic or reply is marked as spam, create or increment a user meta field for the author.

When a user exceeds the allowable spam items, set the user's forum role to 'blocked'.

See Settings > Forum Settings > Spam Limit to set the number of allowable spam items.


Bugs:

- on _edit_user_profile_update_ in bbpab-admin.php, roles are not changed on Save:  Conflict with _Forum Role_ setting ?  Should role be changed here based on spam count ?


To-Do:

- test on multisite

