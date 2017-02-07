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

## Base configuration SEO
```yaml
wh_seo:
    entities:
        WH\BlogBundle\Entity\Post:
            urlFields:
                - {type: 'field', field: 'page.url'}
                - {type: 'field', field: 'slug'}
            defaultMetasFields:
                title: 'name'
                description: 'resume'
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
## Ajouter l'onglet dans le menu admin
Ajouter le code suivant dans le fichier : `src/BackendBundle/Menu/Menu.php`

	$menu->addChild(
		'posts',
		array(
			'label'  => $this->getLabel('globe', 'Actualités'),
			'route'  => 'bk_wh_blog_post_index',
			'extras' => array(
				'safe_label' => true,
			),
		)
	);
