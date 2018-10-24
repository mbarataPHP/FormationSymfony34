


### Windows
#### Télécharger & installer


* [https://www.virtualbox.org/](https://www.virtualbox.org/)
* [https://rubyinstaller.org/downloads/](https://rubyinstaller.org/downloads/)(**WITH DEVKIT 2.4.4-2**)
* [https://www.vagrantup.com/downloads.html](https://www.vagrantup.com/downloads.html)

#### Suite installation

ouvrir le **CMD** en tant que *Administrateur*

installez le plugin

```
vagrant plugin install vagrant-vbguest
```

Création de la VM

```
vagrant up --debug
```

#### Utilisation
lancer la VM
```
vagrant ssh
```

taper la commande `start-service`
```
start-service
```

allez dans le dossier `/vagrant/www`
```
cd /vagrant/www
```

télécharger les bibliothéques
```
composer install
```

création de la base de donnée + avec ses tables
```
php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:schema:update --force
```

lancer les fixtures
```
php bin/console doctrine:fixture:load -n
```

| alias  | description |
| ------------- | ------------- |
| start-service  | Démarre les services(apache, mysql)  |
| start-mail  | active mailcatcher  |
| phpunit  | Lance les tests php  |
| composer  | Composer est un outil de gestion des dépendances en PHP  |

cliquez sur le lien(http://127.0.0.1:8080/)

#### lancer les tests
allez dans le dossier `/vagrant/www`
```
cd /vagrant/www
```

taper la commande `start-service`
```
start-service
```

taper la commande `phpunit`
```
phpunit
```

#### lancer phpmyadmin
taper la commande `start-service`
```
start-service
```
cliquez sur le lien(http://127.0.0.1:8085/)

Username: `vagrant`

Password: `vagrant`

#### lancer mailcatcher
taper la commande `start-mail`
```
start-mail
```
cliquez sur le lien(http://127.0.0.1:1080/)
