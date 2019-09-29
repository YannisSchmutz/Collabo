# Collabo


## Setup an Ubuntu server 18.10 VM
sudo apt-get update
sudo apt-get upgrade


## Install FTP Server
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
  Root-path:  /path/to/project/folder/on/remote/server/
  
Make sure the User you've specified has the permissions to read and write files on the remote server!
Tools -> Deployment -> Upload to collabo

