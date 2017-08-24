<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AfficheController extends Controller
{
	public function ItemsAction($page)
	{	

		$personnages = $this->container->get('personnages');
		$Keys = $this->container->get('keys');
		$pblicKey = $Keys->clePublique();
		$prvateKey = $Keys->clePrivée();
		$nbParPage = 20;
		$offset = ($page-1) * $nbParPage;

		$totalPersonnages = $personnages->affiche($offset, $nbParPage, $pblicKey, $prvateKey)->data->total;
		$nbPage = ceil($totalPersonnages/$nbParPage);

		if ($page < 1) {
      		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}
		if ($page > $nbPage) {
	    	throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }

		return $this->render("APPersonnagesBundle:Items:personnages.html.twig", array(
			'personnages' => $personnages->affiche($offset, $nbParPage, $pblicKey, $prvateKey),
			'nbPages' => $nbPage,
			'page' =>$page ));
	}
}
