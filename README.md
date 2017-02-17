# Installation
## Composer
`composer require whatson-web/blog-bundle dev-master`

`app/console wh:install:bundle blog`

## Ajouter les routes
```yaml
bk_blog:
    resource: "@BlogBundle/Controller/Backend/"
    type:     annotation
```

## Base configuration SEO
```yaml
wh_seo:
    entities:
        BlogBundle\Entity\Post:
            urlFields:
                - {type: 'field', field: 'page.url'}
                - {type: 'field', field: 'slug'}
            defaultMetasFields:
                title: 'name'
                description: 'resume'
```

## Ajouter l'onglet dans le menu admin
Ajouter le code suivant dans le fichier : `src/BackendBundle/Menu/Menu.php`

	$menu->addChild(
		'posts',
		array(
			'label'  => $this->getLabel('globe', 'Actualités'),
			'route'  => 'bk_blog_post_index',
			'extras' => array(
				'safe_label' => true,
			),
		)
	);
