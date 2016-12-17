<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.12.16
 * Time: 13:16
 */
namespace Conversio\Conversation;

use Conversio\Conversation\Mail\MailContainer;

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