<?php

namespace WH\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use WH\LibBundle\Entity\Content;
use WH\LibBundle\Entity\LogDate;
use WH\LibBundle\Entity\Status;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="WH\BlogBundle\Repository\PostRepository")
 */
class Post
{

	use Content, LogDate;
	use Status {
		Status::__construct as private __statusConstruct;
	}

	/**
	 * Post constructor.
	 */
	public function __construct()
	{

		$this->__statusConstruct();
	}

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{

		return $this->id;
	}
}
