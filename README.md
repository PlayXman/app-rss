# Rss messaging for Gigi
App for creating rss feed by form in `/view`. Feed is located in `/feed/feed.xml`.

### View
View is protected by basic apache password.

## Installation
1. Build css and js by gulpfile in `/view`
2. Configure protection
	1. Fill name and password into `/view/.htpasswd`
	2. Change path in `/view/.htaccess`
	3. Fill token in `/config.php`
3. Fill default url link in `/config.php`. It's fallback for rss entries