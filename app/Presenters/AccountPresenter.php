<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Application\UI;


final class AccountPresenter extends BasePresenter
{

	protected function createComponentRecoveryForm(): UI\Form
	{
		$form = new UI\Form;
		$form->addEmail('email', 'e-mail:')->setRequired('Zadejte prosím e-mail');
		$form->addSubmit('recovery', 'Obnovit');
		$form->onSuccess[] = [$this, 'recoveryFormSucceeded'];
		return $form;
	}

	public function recoveryFormSucceeded(UI\Form $form, \stdClass $values): void
	{
		$this->flashMessage('Vaše heslo bylo obnoveno');
		$this->redirect('Homepage:');
	}

}
