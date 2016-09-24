<?php

namespace Catalog\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalog\CatalogBundle\Entity\Product
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Catalog\CatalogBundle\Entity\Category")
     * @ORM\JoinTable(name="cat_prod",
     *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
     *      )
     **/
    protected $categories;

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

}

