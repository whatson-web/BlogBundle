<?php

namespace WH\BlogBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use WH\BackendBundle\Controller\Backend\BaseController;

/**
 * @Route("/admin/blog/posts")
 *
 * Class PostController
 *
 * @package WH\BlogBundle\Controller\Backend
 */
class PostController extends BaseController
{

    public $bundlePrefix = 'WH';
    public $bundle = 'BlogBundle';
    public $entity = 'Post';

    /**
     * @Route("/index/", name="bk_wh_blog_post_index")
     *
     * @param Request $request
     *
     * @return string
     */
    public function indexAction(Request $request)
    {

        $indexController = $this->get('bk.wh.back.index_controller');

        return $indexController->index($this->getEntityPathConfig(), $request);
    }

    /**
     * @Route("/create/", name="bk_wh_blog_post_create")
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function createAction(Request $request)
    {

        $createController = $this->get('bk.wh.back.create_controller');

        return $createController->create($this->getEntityPathConfig(), $request);
    }

    /**
     * @Route("/update/{id}", name="bk_wh_blog_post_update")
     *
     * @param         $id
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($id, Request $request)
    {
        $post = $this->get('doctrine')->getManager()->getRepository('WHBlogBundle:Post')->get(
            'one',
            array(
                'conditions' => array(
                    'post.id' => $id,
                ),
            )
        );
        $this->get('wh_seo.url_generator')->saveUrl($post);
        $updateController = $this->get('bk.wh.back.update_controller');

        return $updateController->update($this->getEntityPathConfig(), $id, $request);
    }

    /**
     * @Route("/delete/{id}", name="bk_wh_blog_post_delete")
     *
     * @param         $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {

        $deleteController = $this->get('bk.wh.back.delete_controller');

        return $deleteController->delete($this->getEntityPathConfig(), $id);
    }

}
