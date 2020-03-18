FROM php:7.4-fpm
LABEL author="suhanyujie<suhanyujie@qq.com>" version="0.1.1"

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && echo "deb http://mirrors.aliyun.com/debian stretch main contrib non-free" >> /etc/apt/sources.list \
    &&  echo "deb http://mirrors.aliyun.com/debian stretch-proposed-updates main contrib non-free" >> /etc/apt/sources.list \
    &&  echo "deb http://mirrors.aliyun.com/debian stretch-updates main contrib non-free" >> /etc/apt/sources.list \
    &&  echo "deb http://mirrors.aliyun.com/debian-security/ stretch/updates main non-free contrib">> /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y iptables \
    && apt-get install -y git \
    && apt-get install -y zlib1g=1:1.2.8.dfsg-5 --allow-downgrades\
    && apt-get install -y zlib1g-dev libicu-dev g++ \
    && apt-get install -y libzip-dev zip unzip \
    && docker-php-ext-install -j$(nproc) pdo_mysql  \
    && docker-php-ext-install -j$(nproc) bcmath \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) calendar \
    && docker-php-ext-install -j$(nproc) exif \
    && docker-php-ext-install -j$(nproc) gettext  \
    && docker-php-ext-install -j$(nproc) mysqli \
    && docker-php-ext-install -j$(nproc) pcntl \
    && docker-php-ext-install -j$(nproc) shmop \
    && docker-php-ext-install -j$(nproc) sockets \
    && docker-php-ext-install -j$(nproc) sysvmsg \
    && docker-php-ext-install -j$(nproc) sysvsem  \
    && docker-php-ext-install -j$(nproc) sysvshm \
#    && apt-get install -y libxml2=2.9.4+dfsg1-2.2+deb9u2 libxslt-dev libxml2-dev --allow-downgrades \
#    && docker-php-ext-install -j$(nproc) xsl \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

WORKDIR /opt

CMD php-fpm
# 解决 libzip 找不到的问题
# apt-get install zlib1g=1:1.2.8.dfsg-5
# apt-get install -y zlib1g-dev libicu-dev g++
# apt-get install -y libzip-dev zip unzip

# 不能直接  docker-php-ext-install -j$(nproc) redis
# 安装 xsl 扩展会报 xsltlocale.h:20:10: fatal error: xlocale.h: No such file or directory
