#przykładowy cron * 12,23 * * * sh "/root/niebezpiecznik/niebezpiecznik.sh" > /dev/null 2>&1
php "/root/niebezpiecznik/function.php"> /dev/null 2>&1
sleep 10
php /root/niebezpiecznik/rss.php > /var/webpages/rss/niebezpiecznik/rss.xml
