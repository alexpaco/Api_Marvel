<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AfficheController extends Controller
{
	public function ItemsAction($page)
	{	
		if ($page < 1) {
      		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}

		$personnages = $this->container->get('personnages');
		$nbParPage = 20;
		$offset = ($page-1) * $nbParPage;

		$totalPersonnages = $personnages->affiche($offset, $nbParPage)->data->total;
		$nbPage = ceil($totalPersonnages/$nbParPage);

		if ($page > $nbPage) {
	    	throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }

		return $this->render("APPersonnagesBundle:Items:personnages.html.twig", array(
			'personnages' => $personnages->affiche($offset, $nbParPage),
			'nbPages' => $nbPage,
			'page' =>$page ));
	}
}
