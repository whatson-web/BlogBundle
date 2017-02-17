<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\BlogBundle\Model\Post as BasePost;

/**
 * Class Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\PostRepository")
 *
 * @package BlogBundle\Entity
 */
class Post extends BasePost
{

}
