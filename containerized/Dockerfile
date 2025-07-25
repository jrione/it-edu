FROM alpine:3.21

WORKDIR /var/www/html

RUN apk update && apk add --no-cache \
    nginx \
    supervisor \
    php84 \
    php84-fpm \
    php84-opcache \
    php84-mysqli \
    php84-pdo \
    php84-pdo_mysql \
    php84-session \
    php84-mbstring \
    php84-json \
    php84-ctype \
    php84-curl \
    php84-fileinfo \
    php84-intl \
    php84-tokenizer \
    supervisor \
    bash \
    curl \
    tzdata

COPY containerized/nginx.conf /etc/nginx/nginx.conf
COPY containerized/supervisord.conf /etc/supervisord.conf
COPY . /var/www/html/
#COPY containerized/custom.ini /etc/php8/conf.d/99-custom.ini

RUN sed -i 's/user = nobody/user = nginx/' /etc/php84/php-fpm.d/www.conf
RUN sed -i 's/group = nobody/group = nginx/' /etc/php84/php-fpm.d/www.conf

RUN chown -R nginx:nginx /var/www/html

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
