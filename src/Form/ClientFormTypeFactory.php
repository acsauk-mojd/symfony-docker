<?php declare(strict_types=1);


namespace App\Form;


class ClientFormTypeFactory
{
    /**
     * @var string
     */
    private $emailEnabled;

    public function __construct(string $emailEnabled)
    {
        $this->emailEnabled = $emailEnabled;
    }

    public function createClientFormType()
    {
        return $this->emailEnabled == 'True' ? new ClientFormTypeEmail() : new ClientFormType();
    }
}