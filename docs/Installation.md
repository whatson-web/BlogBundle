# Installation
## Composer
`composer require whatson-web/blog-bundle dev-master`

## Déclaration du bundle dans le AppKernel

```php
new WH\BlogBundle\WHBlogBundle(),
```
## Ajouter les routes
```yaml
bk_wh_blog:
    resource: "@WHBlogBundle/Controller/Backend/"
    type:     annotation
```

## Installation des entités
Copier les fichiers suivants dans `/src/WHEntities/BlogBundle` :

- [Post](https://github.com/whatson-web/BlogBundle/tree/master/docs/installation/WHEntities/Post.php)

Déclarer les dans `config.yml` :

```yaml
doctrine:
    orm:
        mappings:
            WHEntitiesBlog:
                type: annotation
                is_bundle: false
                dir: '%kernel.root_dir%/../src/WHEntities/BlogBundle'
                prefix: WH\BlogBundle\Entity
                alias: WHBlogBundle
```

Déclarer les manuellement dans `/app/autoload.php` :

```php
AnnotationRegistry::registerFile(__DIR__ . '/../src/WHEntities/BlogBundle/Post.php');
```