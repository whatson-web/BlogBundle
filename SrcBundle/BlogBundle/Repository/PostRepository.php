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

    public $joins = array(
        'url'   => array(),
        'metas' => array(),
        'page'  => array(),
    );

    /**
     * @return string
     */
    public function getEntityNameQueryBuilder()
    {
        return 'post';
    }

    /**
     * @return mixed
     */
    public function getBaseQuery()
    {
        $this->qb = $this
            ->createQueryBuilder($this->getEntityNameQueryBuilder())
            ->orderBy('post.created', 'DESC');

        $this->addJoins(
            array()
        );

        return $this->qb;
    }

}
