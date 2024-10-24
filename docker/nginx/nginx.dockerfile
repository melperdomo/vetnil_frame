FROM nginx:1.27

RUN apt update
RUN apt install nano -y

RUN sed -i 's|include /etc/nginx/conf.d/\*.conf;|include /etc/nginx/conf.d/**/\*.conf;|' /etc/nginx/nginx.conf

WORKDIR /etc/nginx