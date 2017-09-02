# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
    config.vm.box = "debian/jessie64"

    config.vm.network "forwarded_port", guest: 80, host: 8080

    config.vm.synced_folder ".", "/vagrant", type: "rsync",
        rsync__exclude: ".git/", group: "www-data", rsync__args: ["--chmod=ugo=rwX"]

    config.vm.provision "shell", inline: <<-SHELL
        sudo apt-get install apt-transport-https
        sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
        sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
        sudo echo "deb https://packages.sury.org/php/ jessie main\ndeb-src https://packages.sury.org/php/ jessie main" > /etc/apt/sources.list.d/sury.list
        sudo wget -O - https://packages.sury.org/php/apt.gpg | apt-key add -
        sudo apt-get update
        sudo apt-get install -y mysql-server curl apache2 php7.1 php7.1-curl php7.1-mcrypt php7.1-mysql
        sudo cat <<EOT > /etc/apache2/sites-enabled/000-default.conf
        <VirtualHost *:80>
            DocumentRoot /vagrant/public

            ErrorLog /var/www/vagrant_www.log

            <Directory /vagrant>
                AllowOverride All
                Order allow,deny
                allow from all
                Require all granted
            </Directory>
        </VirtualHost>
EOT
        sudo a2enmod rewrite
        sudo service apache2 restart
        cd /vagrant
        chmod -R 775 *
        mysql -u root -p'root' --execute="create database if not exists boilerplate"
        mysql -u root -p'root' -D boilerplate < db.sql
    SHELL
end
