<?php

namespace Conversio\Conversation\Tests;

use Conversio\Conversation\Conversation;
use Conversio\Conversation\Mail\MailContainer;
use PHPUnit_Framework_TestCase;

/**
 * Class ConversationTest
 * @package Conversio\Conversation\Tests
 */
class ConversationTest extends PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        $conversation = new Conversation();
        $conversation->setId('firstId');
        $this->assertEquals('firstId', $conversation->getId());

        $conversation = new Conversation();
        $conversation->setId('secondId');
        $this->assertEquals('secondId', $conversation->getId());

        $conversation = new Conversation();
        $this->assertEquals('', $conversation->getId());
    }

    public function testMails()
    {
        $conversation = new Conversation();
        $this->assertInstanceOf(MailContainer::class, $conversation->mails());
    }
}