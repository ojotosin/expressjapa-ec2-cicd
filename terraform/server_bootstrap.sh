#!/bin/bash

sudo yum update -y
sudo yum install wget -y
sudo yum install zip -y
sudo yum install unzip -y

# install apache 
sudo yum install -y httpd
sudo systemctl enable httpd 
sudo systemctl start httpd


# install php 
sudo amazon-linux-extras enable php7.4
sudo yum clean metadata
sudo yum install php php-common php-pear -y
sudo yum install -y php mod_php
sudo yum install php-{cgi,curl,pdo,mbstring,gd,mysqlnd,gettext,json,xml,fpm,intl,zip} -y


# install mysql5.7
sudo rpm -Uvh https://dev.mysql.com/get/mysql57-community-release-el7-11.noarch.rpm
sudo rpm --import https://repo.mysql.com/RPM-GPG-KEY-mysql-2022
sudo yum install mysql-community-server -y
sudo systemctl enable mysqld
sudo systemctl start mysqld


# set permissions
sudo usermod -a -G apache ec2-user
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;
sudo find /var/www -type f -exec sudo chmod 0664 {} \;

# download the expressjapa zip from s3 to the html directory on the ec2 instance
cd /var/www/html
sudo wget https://github.com/ojotosin/expressjapa-ec2-cicd/raw/main/expressjapa.zip /var/www/html

# unzip the expressjapa zip folder
cd /var/www/html
sudo unzip expressjapa.zip


# move all the files and folder from the expressjapa directory to the html directory
sudo mv expressjapa/* /var/www/html


# move the hidden files from the expressjapa diretory to the html directory
sudo mv expressjapa/.htaccess /var/www/html
sudo mv expressjapa/.editorconfig /var/www/html


# delete the expressjapa and expressjapa.zip folder
sudo rm -rf expressjapa expressjapa.zip


# enable mod_rewrite on ec2 linux
sudo sed -i '/<Directory "\/var\/www\/html">/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf

# Locate the PHP configuration file
php_ini_file=$(php -i | grep 'Loaded Configuration File' | awk '{print $5}')

# Enable allow_url_fopen in the PHP configuration file
sudo sed -i 's/;allow_url_fopen = Off/allow_url_fopen = On/g' "$php_ini_file"

# Restart the web server 
sudo service httpd restart



# configuring the database.php file for ubuntu
sudo sed -i "/^	'hostname'/ s/=.*$/=> '$RDS_ENDPOINT',/" ./application/config/database.php
sudo sed -i "/^	'database'/ s/=.*$/=> '$RDS_DB_NAME',/" ./application/config/database.php 
sudo sed -i "/^	'username'/ s/=.*$/=> '$RDS_MASTER_USERNAME',/" ./application/config/database.php
sudo sed -i "/^	'password'/ s/=.*$/=> '$RDS_DB_PASSWORD',/" ./application/config/database.php

# configuring the database.php for centos
# sudo sed -i "s/^[\t ]*'hostname'.*=.*$/'hostname' => 'localhost2',/" ./application/config/database.php
# sudo sed -i "s/^[\t ]*'database'.*=.*$/'database' => 'mysqldb',/" ./application/config/database.php
# sudo sed -i "s/^[\t ]*'username'.*=.*$/'username' => 'mysqluser',/" ./application/config/database.php
# sudo sed -i "s/^[\t ]*'password'.*=.*$/'password' => 'Mysqlpassword1@/" ./application/config/database.php


# set permissions
sudo chmod -R 777 /var/www/html
sudo chown apache:apache -R /var/www/html

# restart server
sudo service httpd restart