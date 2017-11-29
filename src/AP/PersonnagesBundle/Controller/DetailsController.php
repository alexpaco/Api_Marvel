<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DetailsController extends Controller
{
	public function personnageAction($id)
	{
		$personnage = $this->container->get('personnages');

		$details = $personnage->one($id)->data->results[0];

		return $this->render("APPersonnagesBundle:Items:details.html.twig", array(
			'personnage' => $details ));
	}

	public function serieAction($id)
	{
		$serie = $this->container->get('series');

		$details = $serie->one($id)->data->results[0];

		return $this->render("APPersonnagesBundle:Items:detailsSerie.html.twig", array(
			'serie' => $details ));
	}
}
