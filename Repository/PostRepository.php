<?php

namespace WH\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use WH\LibBundle\Repository\BaseRepository;

/**
 * Class PostRepository
 *
 * @package WH\BlogBundle\Repository
 */
class PostRepository extends BaseRepository
{

	/**
	 * @return string
	 */
	public function getEntityNameQueryBuilder()
	{

		return 'post';
	}
}
