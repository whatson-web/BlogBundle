<?php

namespace BlogBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use WH\LibBundle\Entity\Status;

/**
 * Class PostController
 *
 * @package BlogBundle\Controller\Frontend
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
		$post = $em->getRepository('BlogBundle:Post')->get(
			'one',
			array(
				'conditions' => array(
					'post.id'     => $id,
					'post.status' => Status::$STATUS_PUBLISHED,
				),
			)
		);
		if (!$post) {
			throw new NotFoundHttpException('Actualité introuvable');
		}

		return $this->render(
			'BlogBundle:Frontend/Post:view.html.twig',
			array(
				'post' => $post,
			)
		);
	}

}
