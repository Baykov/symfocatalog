<?php

namespace Catalog\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{

    public function showAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
                FROM CatalogCatalogBundle:Category c
                WHERE c.name like :name
                ORDER BY c.name ASC'
        )->setParameter('name','%'.$name.'%' );

        $category = $query->getResult();

        return $this->render('CatalogCatalogBundle:Category:index.html.twig', array('category' => $category));
    }

    public function showallAction($mode=0)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT c
                FROM CatalogCatalogBundle:Category c
                WHERE c.id > 0
                ORDER BY c.id ASC'
        );

        $categories = $query->getResult();
        
        if (!$categories) {
            throw $this->createNotFoundException(
                'No $categories found '
            );
        }

        if($mode==1){
            return $this->render('CatalogCatalogBundle:Category:allproducts.html.twig', array('categories' => $categories));
        }

        return $this->render('CatalogCatalogBundle:Category:all.html.twig', array('categories' => $categories));
    }

}