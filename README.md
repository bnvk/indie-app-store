# Indie App Store

A store for Indie web apps: http://indiewebcamp.com/store



## Set up development environment

```
git clone git@github.com:brennannovak/indie-app-store.git
cd indie-app-store
git submodule init; git submodule update # fetch Kirby
cd kirby
git submodule init; git submodule update # fetch Kirby dependencies
```

Then compile to fetch the apps:
```
php compiler.php
```
