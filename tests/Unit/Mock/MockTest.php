<?php

namespace Tests\Unit\Mock;

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function test_observer_updated()
    {
        $observer = $this->getMockBuilder(Observer::class)->getMock();

        $observer->method('update')->with($this->equalTo('test'));

        $subject = new Subject('First');
        $subject->attach($observer);
        $subject->doSomething();
    }
}

class Subject
{
    protected $observers = [];
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function doSomething()
    {
        $this->notify('something');
    }

    public function doSomethingBad()
    {
        foreach ($this->observers as $observer) {
            $observer->reportError(42, 'Произошло что-то плохое', $this);
        }
    }

    protected function notify($argument)
    {
        foreach ($this->observers as $observer) {
            $observer->update($argument);
        }
    }
}

class Observer
{
    public function update($argument)
    {

    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {

    }
}