# Rss messaging for Gigi
App for creating rss feed by form in `/view`. Feed is located in `/feed/feed.xml`.

### View
There're two separate views.
1. `/view/show` - It shows 1 post from the feed. It takes `t` param from url to identify correct post in feed.
2. `/view/add` - Form creating new post in feed. It's protected by basic apache password.

## Installation
1. Build css and js by gulpfile in `/view`
2. Configure protection
	1. Fill name and password into `/view/.htpasswd`
	2. Change path in `/view/.htaccess`
	3. Fill token in `/config.php`
3. Fill default url link in `/config.php`. It's fallback for rss entries
