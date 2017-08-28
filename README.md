# Install requirements on Debian

1. Add the Dotdeb repository to /etc/apt/sources.list:

    ```
    deb http://packages.dotdeb.org jessie all
    deb-src http://packages.dotdeb.org jessie all
    ```

2. Install their GPG key

    ```
    wget https://www.dotdeb.org/dotdeb.gpg -O - | apt-key add -
    ```

3. `apt-get update`

4. `apt-get install mysql-server`

5. `mysql_secure_installation`

6. `apt-get install curl apache2 php7.0 php7.0-curl php7.0-mcrypt php7.0-mysql`

7. Set the Apache DocumentRoot to the `public` directory (e.g. `/var/www/boilerplate/public`).

8. Make sure you have mod_rewrite enabled:

    First, run `a2enmod rewrite`.
    
    Then, add the following to your Apache config:
    
    ```
    <Directory /var/www/>
                AllowOverride All
                Order allow,deny
                allow from all
    </Directory>
    ```
    Finally, restart apache `service restart apache2`

# Install boilerplate

1. Upload the boilerplate files to Apache's file root (e.g. `/var/www/boilerplate`).

2. Run `composer install`

3. Import the database. First create a database with the name of your choice (`CREATE DATABASE boilerplate;`), then run the following:
    
    ```
    mysql boilerplate < db.sql
    ```

4. Make sure to set the keys `file_dir` and `view_dir` in the `config` table according to your environment.

# Replace the `acme` namespace with your own

By default, all classes are in the `acme` namespace. To switch to your own namespace, follow these steps, replacing `binaro` with your desired namespace name.

1. Rename the directory `lib/acme` to `lib/binaro`

2. Run 
    
    ```
    sed -i '' 's/acme/binaro/g' `find * -type f -print`
    ```
