<?php


namespace App\Controllers;

use App\Views;
use App\Modules;


class CProduct
{
    /**
     * @var Views;
     */
    private Views\View $view;

    /**
     * @var MProduct
     */
    private Modules\MProduct $mProduct;


    public function __construct()
    {
        $this->view     = new Views\View();
        $this->mProduct = new Modules\MProduct();
    }


    public function get(string $name)
    {
        return $this->mProduct->get($name);
    }


    public function set(string $name, array $value)
    {
        $this->mProduct->save($name, $value);
    }


    public function show()
    {
        $this->view->show();
    }
}