crontab -r
(crontab -l 2>/dev/null; echo "*/5 $1-$2 * * * /bin/php /hack/hackthon/resources/system_script/match.php -with args") | crontab -
(crontab -l 2>/dev/null; echo "*/1 $3-$4 * * * /bin/php /hack/hackthon/resources/system_script/match.php -with args") | crontab -
(crontab -l 2>/dev/null; echo "*/1 * * * * * /bin/curl localhost:8000/mail/send_mail -with args") | crontab -
