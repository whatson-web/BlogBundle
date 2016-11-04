<?php

namespace WH\BlogBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PostController
 *
 * @package WH\BlogBundle\Controller\Frontend
 */
class PostController extends Controller
{

	/**
	 * @param         $id
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function viewAction($id, Request $request)
	{
		$em = $this->get('doctrine')->getManager();
		$post = $em->getRepository('WHBlogBundle:Post')->get(
			'one',
			array(
				'conditions' => array(
					'post.id'     => $id,
					'post.status' => 'published',
				),
			)
		);

		return $this->render(
			'WHBlogBundle:FrontEnd/Post:view.html.twig',
			array(
				'post' => $post,
			)
		);
	}

}
