# Collabo

In the this documentation the following terms are used as placeholder:
  USER:       The user of your VM/ your server (e.g yannis)
  IP          The IP of your VM/ your server (e.g 192.168.0.213)
  PROJECT:    The name of the project (e.g collabo)


## Setup an Ubuntu server 18.10 VM
Install an Ubuntu server on a VM or something of a kind
  sudo apt-get update
  sudo apt-get upgrade


## Install Laravel
sudo apt install apache2

sudo apt install php7.2 libapache2-mod-php7.2 php7.2-mbstring php7.2-xmlrpc php7.2-soap php7.2-gd php7.2-xml php7.2-cli php7.2-zip


Edit:
sudo vi /etc/php/7.2/apache2/php.ini
  memory_limit = 256M
  upload_max_filesize = 64M
  cgi.fix_pathinfo=0

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

cd /var/www/html
sudo composer create-project laravel/laravel <PROJECT> --prefer-dist

Set permissions for the project
Change the permissions recursevly to www-data
  sudo chown -R www-data:www-data /var/www/html/<PROJECT>/
  sudo chmod -R 755 /var/www/html/PROJECT/
add your user ) to the group www-data
  sudo usermod -G www-data -a <USER>
  sudo chmod -R g+rwx /var/www/html/<PROJECT>/

#You have to log-out and in again to modify files in Tryout

## Configure Apache
sudo vi /etc/apache2/sites-available/laravel.conf

#!!! TODO: be able to access the public folder by just using the IP and not having to type IP/<PROJECT>/public !!!

<VirtualHost *:80>
  ServerAdmin yannisvalentin.schmutz@students.bfh.ch
     DocumentRoot /var/www/html/<PROJECT>/public
     ServerName localhost

     <Directory /var/www/html/Tryout/public>
        Options +FollowSymlinks
        AllowOverride All
        Require all granted
     </Directory>

     ErrorLog ${APACHE_LOG_DIR}/error.log
     CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

Enable laravel.conf as site
  sudo a2ensite laravel.conf
  sudo a2enmod rewrite


sudo vi /etc/hosts
  127.0.0.1 localhost
  0.0.0.0 tryout.dev



## Install FTP Server

sudo apt-get install vsftpd

Edit
sudo vi /etc/vsftpd.conf
  anonymous_enable=YES
  anon_upload_enable=YES
  write_enable=YES

sudo systemctl restart vsftpd.service
  
  
## PhPStorm

Tools -> Deployment -> Configuration -> + -> "collabo"
  Type:       FTP
  Host:       VM-IP
  User:       VM-User
  PW:         VM-PW
  Root-path:  /var/www/html/<PROJECT>
  
Make sure the User you've specified has the permissions to read and write files on the remote server!

Upload a files to the server
  select a file
  Tools -> Deployment -> Upload to collabo


!!! After you've uploaded a new file, you have to change its permissions on the remote machine!!!
  sudo chown www-data:www-data <THE-FILE>
  sudo chmod 775 <THE-FILE>




sudo systemctl stop apache2.service
sudo systemctl enable apache2.service
sudo systemctl start apache2.service
