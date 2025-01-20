FROM ubuntu:latest
RUN apt-get update 
RUN  apt-get install -y apache2
RUN apt install php libapache2-mod-php php-mysql -y
EXPOSE 80


WORKDIR /var/www/html
RUN rm -rf *
COPY ./site/index.php .
ENTRYPOINT [ "apache2ctl" , "-D" , "FOREGROUND" ]