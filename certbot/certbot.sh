#ONLY FOR ENG 
docker run --rm -v ~/NTNUENG_mail/certbot/letsencrypt:/etc/letsencrypt -v ~/NTNUENG_mail/html:/html -ti -p 80:80 certbot/certbot certonly --standalone --email eoleedimin@gmail.com --agree-tos  -d cas.eng.ntnu.edu.tw
