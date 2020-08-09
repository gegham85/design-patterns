<?php

interface Subject
{
    public function attach(Observer $observer);
    public function detach($index);
    public function notify(Message $message);
}

interface Observer
{
    public function update(Message $m);
}

class MessagePublisher implements Subject
{
    protected $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify(Message $message)
    {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}


class MessageSubscriberOne implements Observer
{
    public function update(Message $m)
    {
        var_dump("MessageSubscriberOne:: " . $m->getMessageContent());
    }
}

class MessageSubscriberTwo implements Observer
{
    public function update(Message $m)
    {
        var_dump("MessageSubscriberTwo:: " . $m->getMessageContent());
    }
}

class MessageSubscriberThree implements Observer
{
    public function update(Message $m)
    {
        var_dump("MessageSubscriberThree:: " . $m->getMessageContent());
    }
}

class Message
{
    protected $messageContent;

    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    public function getMessageContent()
    {
        return $this->messageContent;
    }
}



$s1 = new MessageSubscriberOne();
$s2 = new MessageSubscriberTwo();
$s3 = new MessageSubscriberThree();

$messagePublisher = new MessagePublisher();

$messagePublisher->attach($s1);
$messagePublisher->attach($s2);

$messagePublisher->notify(new Message("First Message"));

$messagePublisher->detach(0);
$messagePublisher->attach($s3);

$messagePublisher->notify(new Message("Second Message"));
