
taper la commande pour créer l'image
```
docker build . -t atlas
```

taper la commande pour lancer le container
```
docker run -p 8080:80 -p 8085:85 -p 1080:1080 -v $(pwd)/www:/vagrant/www -ti atlas
```
