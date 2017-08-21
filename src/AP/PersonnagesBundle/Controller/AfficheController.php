<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AfficheController extends Controller
{
	public function ItemsAction()
	{	
		$personnages = $this->container->get('personnages');

		return $this->render("APPersonnagesBundle:Items:personnages.html.twig", array(
			'personnages' => $personnages->affiche() ));
	}
}
