<?php
class CtrlPages extends Controller
{

	public function contactForm()
	{
		$this->render('Pages', 'contactForm');
	}

	public function cgv()
	{
		$this->render('Pages', 'cgv');
	}

	public function infoLivraison()
	{
		$this->render('Pages', 'infoLivraison');
	}

	public function infoPaiement()
	{
		$this->render('Pages', 'infoPaiement');
	}

	public function p404()
	{
		$this->render('Pages', 'p404');
	}
}
