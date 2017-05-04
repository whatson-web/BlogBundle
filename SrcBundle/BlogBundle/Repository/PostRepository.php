<?php

namespace BlogBundle\Repository;

use WH\LibBundle\Repository\BaseRepository;

/**
 * Class PostRepository
 *
 * @package BlogBundle\Repository
 */
class PostRepository extends BaseRepository
{
    public $entityName = 'post';

    public $joins = [
        'url'   => '',
        'metas' => '',
        'page'  => '',
    ];

    public $baseJoins = [
        'url',
        'metas',
    ];
    public $baseOrders = [
        'post.created' => 'DESC',
    ];
}
