# ContaoEloquentExampleProjectBundle

Bundle for the [fuzzyma/contao-eloquent-example-project](https://github.com/Fuzzyma/contao-eloquent-example-project)
which shows the eloquent features brought to you by the
[fuzzyma/contao-eloquent-bundle](https://github.com/Fuzzyma/contao-eloquent-bundle)

## Installation

**If you don't want to do this manually you can just create a project with:**
```bash
composer create-project fuzzyma/contao-eloquent-example-project exampleProject
```

If not:

### Step 1: Install

```bash
composer require fuzzyma/contao-eloquent-example-project-bundle
```

### Step 2: Register Bundles

Add this three lines into your AppKernel.php

```php
new WouterJ\EloquentBundle\WouterJEloquentBundle(),
new Fuzzyma\Contao\EloquentBundle\ContaoEloquentBundle(),
new Fuzzyma\Contao\EloquentExampleProjectBundle\ContaoEloquentExampleProjectBundle(),
```

### Step 3: Configure

Add this to your config:
```yaml
wouterj_eloquent:
    connections:
        default:
            database:  "%database_name%"
            driver:    mysql
            host:      "%database_host%"
            username:  "%database_user%"
            password:  "%database_password%"
            charset:   utf8
            collation: utf8_unicode_ci
            prefix:    'tl_'
    default_connection: default
    eloquent: true
    aliases: false
```

### Step 4: Update database

Open your install tool and run a database update.
You can also do that by installing the [fuzzyma/contao-database-commands-bundle](https://github.com/Fuzzyma/contao-database-commands-bundle).

Now you are free to test the new eloquent features!