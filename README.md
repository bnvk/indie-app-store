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


## Create An indie.json Manifest For Your App

If you have a server-side app or client-side app that you want to be installable in Indie App Stores, create a manifest like the example below. Once you've created the manifest, open an Issue on this repo with a link to your manifest file and we will include it in the master list.

This manifest is based on the w3c standard https://w3c.github.io/manifest/ with additional fields added to meet our needs. We will be submitting these needs to the w3c and working to keep our spec in sync with theirs as it evolves.


```
{
    "name": "Mailpile",
    "short_name": "",
    "icons": [
        {
            "src": "https://www.mailpile.is/img/logo-512x512.png",
            "sizes": "512x512",
            "type": "image/png",
            "density": "1"
        },
        {
            "src": "https://www.mailpile.is/img/logo-256x256.png",
            "sizes": "256x256",
            "type": "image/png",
            "density": "1"
        },
        {
            "src": "https://www.mailpile.is/img/logo-color.png",
            "sizes": "100x100",
            "type": "image/png",
            "density": "1"
        }
    ],
    "start_url": "/",
    "display": "fullscreen",
    "orientation": "landscape",
    "short_description": "Mailpile is a modern, fast web-mail client with user-friendly encryption and privacy features",
    "description": "Mailpile offers powerful search & tagging makes your pile of mail managable, is designed to be fast and responsive, outperforming the cloud even on slow computers, and offers OpenPGP signatures and encryption are part of Mailpile's core design, not an afterthought or plugin.",
    "license": "AGPLv3/Apache 2.0",
    "license_url": "https://raw.github.com/pagekite/Mailpile/master/LICENSE-2.0.txt",
    "source_url": "https://github.com/pagekite/mailpile",
    "version": "0.1.0",
    "developer": {
        "name": "Mailpile ehf.",
        "url": "https://mailpile.is"
    },
    "wikipedia_url": "https://wikipedia.org/wiki/Mailpile",
    "default_locale": "en",
    "protocols": [
        "GPG",
        "SSL/TLS",
        "Tor",
        "XMPP"
    ],
    "categories": [
        {
            "name": "BSD",
            "subcategories": [
                "Email Clients",
                "PGP"
            ]
        },
        {
            "name": "GNU/Linux",
            "subcategories": [
                "Email Clients",
                "PGP"
            ]
        },
        {
            "name": "OS X",
            "subcategories": [
                "Email Clients",
                "PGP"
            ]
        },
        {
            "name": "Windows",
            "subcategories": [
                "Email Clients",
                "PGP"
            ]
        }
    ]
}
```