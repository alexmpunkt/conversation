<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.12.16
 * Time: 13:27
 */
namespace Conversio\Conversation\Tests\Mail;

use Conversio\Conversation\Mail\MailContainer;
use Conversio\Mail\Address\Address;
use Conversio\Mail\Mail;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class MailContainerTest
 * @package Conversio\Conversation\Tests\Mail
 */
class MailContainerTest extends TestCase
{
    public function testIsEmpty()
    {
        $container = new MailContainer();
        $this->assertTrue($container->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $mail      = new Mail(new Address('test@test.de', 'Max Mustermann'));
        $container = new MailContainer();
        $container->addMail($mail);
        $this->assertFalse($container->isEmpty());
    }

    public function testAddAddress()
    {
        $mail1     = new Mail(new Address('test@test.de', 'Max Mustermann'));
        $mail2     = new Mail(new Address('john.doe@test.de', 'John Doe'));
        $container = new MailContainer();
        $container->addMail($mail1);
        $this->assertEquals(1, $container->count());
        $container->addMail($mail2);
        $this->assertEquals(2, $container->count());
    }

    public function testSize()
    {
        $mail1     = new Mail(new Address('test@test.de', 'Max Mustermann'));
        $mail2     = new Mail(new Address('john.doe@test.de', 'John Doe'));
        $mail3     = new Mail(new Address('john.doe2@test.de', 'John Doe2'));
        $container = new MailContainer();
        $container->addMail($mail1);
        $this->assertEquals(1, $container->count());
        $container->addMail($mail2);
        $this->assertEquals(2, $container->count());
        $container->addMail($mail3);
        $this->assertEquals(3, $container->count());
    }

    public function testGetById()
    {
        $mail1 = new Mail(new Address('test@test.de', 'Max Mustermann'));
        $mail1->setId('firstId');
        $mail2 = new Mail(new Address('john.doe@test.de', 'John Doe'));
        $mail2->setId('secondId');
        $container = new MailContainer();
        $container->addMail($mail1);
        $container->addMail($mail2);

        $this->assertEquals($mail1, $container->getById('firstId'));
        $this->assertEquals($mail2, $container->getById('secondId'));
        $this->assertNull($container->getById('thirdId'));
    }

    public function testSorting()
    {
        $mail1     = new Mail(new Address('test@test.de', 'Max Mustermann'), new DateTime('2016-01-01'));
        $mail2     = new Mail(new Address('john.doe@test.de', 'John Doe'), new DateTime('2016-02-01'));
        $mail3     = new Mail(new Address('justine.doe@test.de', 'Justine Doe'), new DateTime('2016-03-01'));
        $container = new MailContainer();
        $container->addMail($mail2);
        $container->addMail($mail3);
        $container->addMail($mail1);

        $this->assertEquals(new DateTime('2016-01-01'), $container->first()->getCreatedAt());
        $this->assertEquals(new DateTime('2016-03-01'), $container->last()->getCreatedAt());
    }

    public function testFirstIfEmpty()
    {
        $container = new MailContainer();
        $this->assertNull($container->first());
    }

    public function testLastIfEmpty()
    {
        $container = new MailContainer();
        $this->assertNull($container->last());
    }
}