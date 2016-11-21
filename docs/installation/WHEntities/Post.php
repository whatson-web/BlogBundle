<?php

namespace WH\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\BlogBundle\Model\Post as BasePost;

/**
 * Class Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="WH\BlogBundle\Repository\PostRepository")
 *
 * @package WH\BlogBundle\Entity
 */
class Post extends BasePost
{

}
