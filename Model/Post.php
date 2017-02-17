<?php

namespace WH\BlogBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use WH\LibBundle\Entity\Content;
use WH\LibBundle\Entity\LogDate;
use WH\LibBundle\Entity\Status;

/**
 * Post
 *
 * @ORM\MappedSuperclass
 */
abstract class Post
{

	use Content, LogDate;
	use Status {
		Status::__construct as protected __statusConstruct;
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
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="WH\MediaBundle\Entity\File", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $thumb;

	/**
	 * @ORM\OneToOne(targetEntity="WH\SeoBundle\Entity\Url", cascade={"persist", "remove"})
	 */
	protected $url;

	/**
	 * @ORM\OneToOne(targetEntity="WH\SeoBundle\Entity\Metas", cascade={"persist", "remove"})
	 */
	protected $metas;

	/**
	 * @ORM\ManyToOne(targetEntity="CmsBundle\Entity\Page")
	 * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $page;

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
	 * @param \WH\MediaBundle\Entity\File $thumb
	 *
	 * @return Post
	 */
	public function setThumb(\WH\MediaBundle\Entity\File $thumb = null)
	{
		$this->thumb = $thumb;

		return $this;
	}

	/**
	 * Get thumb
	 *
	 * @return \WH\MediaBundle\Entity\File
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

	/**
	 * Set metas
	 *
	 * @param \WH\SeoBundle\Entity\Metas $metas
	 *
	 * @return Post
	 */
	public function setMetas(\WH\SeoBundle\Entity\Metas $metas = null)
	{
		$this->metas = $metas;

		return $this;
	}

	/**
	 * Get metas
	 *
	 * @return \WH\SeoBundle\Entity\Metas
	 */
	public function getMetas()
	{
		return $this->metas;
	}

    /**
     * Set page
     *
     * @param \WH\CmsBundle\Entity\Page $page
     *
     * @return Post
     */
    public function setPage(\WH\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \WH\CmsBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }
}
