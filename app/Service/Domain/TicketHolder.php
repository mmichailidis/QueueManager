<?php

namespace App\Service\Domain;

class TicketHolder
{
    private $tickets;
    private $appears;

    /**
     * TicketHolder constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param array $tickets
     * @param array $appears
     * @return TicketHolder
     */
    public static function  of (array $tickets, array $appears) {
        $t = new TicketHolder();
        $t->tickets = $tickets;
        $t->appears = $appears;
        return $t;
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @return mixed
     */
    public function getAppears()
    {
        return $this->appears;
    }
}