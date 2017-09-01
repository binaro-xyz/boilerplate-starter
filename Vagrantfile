# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  config.vm.box = "debian/jessie64"

  config.vm.network "forwarded_port", guest: 80, host: 8080

  config.vm.provision "shell", inline: <<-SHELL
    sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
    sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
    sudo echo "deb http://packages.dotdeb.org jessie all\ndeb-src http://packages.dotdeb.org jessie all" >> /etc/apt/sources.list
    sudo wget -O - https://www.dotdeb.org/dotdeb.gpg | apt-key add -
    sudo apt-get update
    sudo apt-get install -y mysql-server curl apache2 php7.0 php7.0-curl php7.0-mcrypt php7.0-mysql
    cd vagrant
    mysql -u root -p'root' < 'create database boilerplate'
    mysql -u root -p'root' < db.sql
  SHELL
end
