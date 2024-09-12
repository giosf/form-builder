Create package:

- create git repository with the package code
- in the pckage code, include a composer.json file with informations about the package. This file also needs a autoload object that registers how the package namespace will point to the folder where the package files are in:
    "autoload": {
        "psr-4": {
            "Giosf\\FormBuilder\\": "src/"
        }
    },
- release it under some tag (e.g. v0.1)
- upload it to packagist
- register the package on your laravel's project composer.json file under "require" and "autoload" objects as below:
    "require": {
        "giosf/form-builder": "0.1"
    },
    "autoload": {
        "psr-4": {
            "Giosf\\FormBuilder\\": "vendor/giosf/form-builder/src/"
        }
    },


