<?php

namespace WH\BlogBundle\Repository;

use WH\LibBundle\Repository\BaseRepository;

/**
 * Class PostRepository
 *
 * @package WH\BlogBundle\Repository
 */
class PostRepository extends BaseRepository
{

	/**
	 * @return \Doctrine\ORM\QueryBuilder
	 */
	public function getBaseQuery()
	{
		return $this
			->createQueryBuilder('post')
			->addSelect('page')
			->addSelect('url')
			->addSelect('metas')
			->leftJoin('post.page', 'page')
			->leftJoin('post.url', 'url')
			->leftJoin('post.metas', 'metas')
			->orderBy('post.created', 'DESC');
	}
}
