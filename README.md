RepoMirror
===========

Mirror your public or private repositories to a GitHub organisation you administrate!

Designed to be used to mirror some of my private repositories to the OresomeCraft organisation.

## Usage
Change the following two variables:
```php
<?php
$hash = "password_hash_here"; // an md5 hash or password used for authentication
$mirror_user = "OresomeCraft"; // Organisation where the repo will be mirrored to
$key = ""; // You'll see what to do here below, in the 'Setting up an authentication key' section
```

Upload this to a web server and you're almost done.
The URL typed to use this script should be as follows:
```
http://your.website.com/mirror_repo.php?hash=<HASH>&origin_user=<USER>&repo=<REPO>
```
So in use it may look something like this:
```
http://your.website.com/mirror_repo.php?hash=5f4dcc3b5aa765d61d&origin_user=Zachoz&repo=RepoMirror
```

## Setting up an authentication key
To use this you will need to create an authorisation key to use your GitHub account. 

To do this, go to your account settings, select "Applications", under "Personal access tokens" click "Generate new token", give it what ever description you want. There will be a section saying "Select Scopes", ensure that 'repo', 'delete_repo' and 'admin:org' are selected. Once done, click "Generate token".

Note that it will only show you the token **once**! So make sure you copy and paste it into your $key variable as soon as you get it!

## Setting up automatic mirroring
Using GitHub webhooks you can make it automatically run this script when a commit is pushed to the repository.

In your repo, go to Settings -> Webhooks & Services -> Add webhook.
For 'Payload URL', put in the URL you would use to run the script (like the examples above), leave all other options as they are and then click "Add webhook".

When adding the hook the PayLoad will be deployed, meaning the script will be run. 

## Important notes
* You must have administrative privledges the the organisation to use this script!
* You must have your authentication token set up to use this!

## Disclaimer
Changing code other than those 3 varibles meantioned up the top without understanding what you're doing may have a devistating effect! If care is not taken when modifying the code, the primary repository could be deleted, etc. I am not responsible for any loss or damage caused by this script.