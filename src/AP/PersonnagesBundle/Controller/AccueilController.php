<?php

namespace AP\PersonnagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
	public function accueilAction()
	{
		return $this->render("APPersonnagesBundle:Accueil:accueil.html.twig");
	}

	public function navigationAction()
	{
		return $this->render("APPersonnagesBundle:Accueil:navigation.html.twig");
	}
}
