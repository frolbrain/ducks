<?php

namespace App\Controller;

use App\DB\CatalogRepository;
use Silex\Application;

class SideMenu
{
	private $CatalogRepository;
	private $app;

	function __construct(CatalogRepository $CatalogRepository, Application $app)
	{
		$this->CatalogRepository = $CatalogRepository;
		$this->app = $app;
	}

	public function page()
	{
		$category_names = $this->CatalogRepository->getCategoryNames();
		return $this->render($category_names);
	}

	protected function render($category_names)
	{
	    return $this->app['twig']->render('side_menu/page.twig', [
			'names' => $category_names,
    	]);
	}
}