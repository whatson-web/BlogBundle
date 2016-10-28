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
	 * @ORM\ManyToOne(targetEntity="WH\AmazonS3MediaBundle\Entity\File")
	 * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
	 */
	private $thumb;

	/**
	 * @ORM\OneToOne(targetEntity="WH\SeoBundle\Entity\Url", cascade={"persist", "remove"})
	 */
	private $url;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set thumb
	 *
	 * @param \WH\AmazonS3MediaBundle\Entity\File $thumb
	 *
	 * @return Post
	 */
	public function setThumb(\WH\AmazonS3MediaBundle\Entity\File $thumb = null)
	{
		$this->thumb = $thumb;

		return $this;
	}

	/**
	 * Get thumb
	 *
	 * @return \WH\AmazonS3MediaBundle\Entity\File
	 */
	public function getThumb()
	{
		return $this->thumb;
	}

	/**
	 * Set url
	 *
	 * @param \WH\SeoBundle\Entity\Url $url
	 *
	 * @return Post
	 */
	public function setUrl(\WH\SeoBundle\Entity\Url $url = null)
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * Get url
	 *
	 * @return \WH\SeoBundle\Entity\Url
	 */
	public function getUrl()
	{
		return $this->url;
	}
}
