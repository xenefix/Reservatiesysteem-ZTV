
## Repository van Reservatiesysteem ZTV

### Installatie Instructies

Prepareer een nieuw systeem met apache2, php en mysql. Tijdens de 
installatie van mysql wordt een wachtwoord gevraagd. Onthoud dit 
wachtwoord goed, in de volgende stap hebben we dit nodig.

```
apt-get update
apt-get upgrade
apt-get install -y php7.0 php7.0-mcrypt php7.0-gd zip unzip php7.0-zip
apt-get install -y apache2 libapache2-mod-php7.0
apt-get install -y mysql-server php7.0-mysql
```

We maken alvast een mysql-database aan met bijbehorende login(username: reservatiesysteem, wachtwoord: reservatiesysteemPW!)
```
mysql -u root -p

Enter password: (wachtwoord van hierboven)

mysql>

CREATE DATABASE reservatiesysteem;
GRANT ALL PRIVILEGES ON reservatiesysteem.* TO 'reservatiesysteem'@'localhost' identified by 'reservatiesysteemPW!';
```
Vervolgens gaan we de broncode van het reservatiesysteem downloaden.

```
cd /var/www
git clone https://github.com/xenefix/Reservatiesysteem-ZTV.git
```
We stellen de juiste file-permissies in:
```
sudo chown -R www-data:www-data /var/www/Reservatiesysteem-ZTV
cd /var/www/Reservatiesysteem-ZTV
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
```


Het project heeft ook nog software van derden nodig. Installeer deze met het volgende commando

```
cd /var/www/Reservatiesysteem-ZTV
php composer.phar install
```
---
Daarna moeten we het project zijn eigenschappen aan de server aanpassen. Om dit te doen moeten we het .env bestand instellen. Eerst kopieren we een template van dit bestand.
```
cp /var/www/Reservatiesysteem-ZTV/.env.example /var/www/Reservatiesysteem-ZTV/.env
```
Bewerk het .env bestand met de database informatie van de server, alsook een smtp-server voor het mailverkeer.
```
nano /var/www/Reservatiesysteem-ZTV/.env

DB_DATABASE=reservatiesysteem
DB_USERNAME=reservatiesysteem
DB_PASSWORD=reservatiesysteemPW!

MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=b9fbb14687fe7d
MAIL_PASSWORD=14344da0898006
```
Nu het systeem is geconfigureerd met de juiste database kunnen we met de installatie verder gaan.
```
cd /var/www/Reservatiesysteem-ZTV
php artisan key:generate
php artisan migrate
php artisan db:seed
```
Normaalgezien is alles nu correct ingesteld. Alvorens de webserver te configureren testen we eerst met de ingebouwde webserver uit of alles goed werkt.
```
php artisan serve --host 0.0.0.0
```
---
Om alles aan de gebruiker beschikbaar te stellen 