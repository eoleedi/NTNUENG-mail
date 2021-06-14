 docker run --rm -v /etc/letsencrypt:/etc/letsencrypt -v ~/NTNUENG_mail/html:/html -ti certbot/certbot renew && docker exec -itd  ntnueng_mail_phpapache_1  service apache2 restart
