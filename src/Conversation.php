<?php

namespace Conversio\Conversation;

use Conversio\Conversation\Mail\MailContainer;

/**
 * Class Conversation
 * @package Conversio\Conversation
 */
class Conversation
{
    /**
     * @var string
     */
    private $id = '';

    /**
     * @var MailContainer
     */
    private $mails;

    public function __construct()
    {
        $this->mails = new MailContainer();
    }

    /**
     * @return MailContainer
     */
    public function mails(): MailContainer
    {
        return $this->mails;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }
}