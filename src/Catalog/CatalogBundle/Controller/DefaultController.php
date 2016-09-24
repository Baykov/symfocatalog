<?php

namespace Catalog\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CatalogCatalogBundle:Default:index.html.twig');
    }
}
