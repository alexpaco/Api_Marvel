<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
	public function AccueilAction()
	{
		return $this->render("APPersonnagesBundle:Accueil:accueil.html.twig");
	}

	public function NavigationAction()
	{
		return $this->render("APPersonnagesBundle:Accueil:navigation.html.twig");
	}
}
