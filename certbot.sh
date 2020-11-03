docker run --rm -v /etc/letsencrypt:/etc/letsencrypt -v ~/NTNUENG_mail/html:/html -ti certbot/certbot certonly --email eoleedimin@gmail.com --agree-tos --webroot -w /html -d cas.eng.ntnu.edu.tw
