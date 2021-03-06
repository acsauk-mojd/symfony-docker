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

    public function createClientForm()
    {
        return $this->emailEnabled == '1' ? new ClientFormTypeEmail() : new ClientFormType();
    }
}