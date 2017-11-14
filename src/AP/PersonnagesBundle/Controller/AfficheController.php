<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AfficheController extends Controller
{
	public function ItemsAction($page)
	{	
		$nbParPage = 20;
		$offset = ($page-1) * $nbParPage;

		$personnages = $this->container->get('personnages');
		$all = $personnages->all($offset, $nbParPage);
		$totalPersonnages = $all->data->total;
		$nbPage = ceil($totalPersonnages/$nbParPage);

		if ($page < 1) {
      		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}
		if ($page > $nbPage) {
	    	throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }

		return $this->render("APPersonnagesBundle:Items:personnages.html.twig", array(
			'personnages' => $all,
			'nbPages' => $nbPage,
			'page' =>$page ));
	}
}
