<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Psr\Log\LoggerInterface;



/** 
 * @Route("/blog")
 */
class BlogController extends BaseController {
    /** 
     * @Route("/", name="blog")
     * @Template()
     */
    public function index() {
        return ['controller_name' => 'BlogController'];
    }

    
    /**
     * @Route("/{page}", name="blog_list", requirements={"page"="\d+"})
     */
    public function list($page) {
        dd($page, 1);
    }
    
    /**
     * @Route("/show/{id}", name="blog_show")
     */
    public function show($id = 1) {
        $this->log("info Message from extended BaseController", "info");       
        dd($id);
    }

}
