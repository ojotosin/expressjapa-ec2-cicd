#!/bin/bash

sudo yum update -y

#2. install apache 
sudo yum install -y httpd
sudo systemctl enable httpd 
sudo systemctl start httpd


#3. install php 7.4
sudo amazon-linux-extras enable php7.4
sudo yum clean metadata
sudo yum install php php-common php-pear -y
sudo yum install php-{cgi,curl,mbstring,gd,mysqlnd,gettext,json,xml,fpm,intl,zip} -y


#4. install mysql5.7
sudo rpm -Uvh https://dev.mysql.com/get/mysql57-community-release-el7-11.noarch.rpm
sudo rpm --import https://repo.mysql.com/RPM-GPG-KEY-mysql-2022
sudo yum install mysql-community-server -y
sudo systemctl enable mysqld
sudo systemctl start mysqld


#5. download the expressjapa zip from s3 to the html derectory on the ec2 instance
sudo aws s3 sync s3://aosnote-expressjapa-web-files /var/www/html


#6. unzip the expressjapa zip folder
cd /var/www/html
sudo unzip expressjapa.zip


#7. move all the files and folder from the expressjapa directory to the html directory
sudo mv expressjapa/* /var/www/html


#8. move the hidden files from the expressjapa diretory to the html directory
sudo mv expressjapa/.htaccess /var/www/html


#9. delete the expressjapa and expressjapa.zip folder
sudo rm -rf expressjapa expressjapa.zip


#10. enable mod_rewrite on ec2 linux
sudo sed -i '/<Directory "\/var\/www\/html">/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf


#11. set permissions
sudo chmod -R 777 /var/www/html

# configuring the database.php file
sudo sed -i "/^	'hostname'/ s/=.*$/=> '$RDS_ENDPOINT',/" ./application/config/database.php
sudo sed -i "/^	'database'/ s/=.*$/=> '$RDS_DB_NAME',/" ./application/config/database.php 
sudo sed -i "/^	'username'/ s/=.*$/=> '$RDS_MASTER_USERNAME',/" ./application/config/database.php
sudo sed -i "/^	'password'/ s/=.*$/=> '$RDS_DB_PASSWORD',/" ./application/config/database.php

#13 restart server
sudo service httpd restart