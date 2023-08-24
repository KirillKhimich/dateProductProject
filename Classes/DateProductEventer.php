<?php

namespace Classes;

class DateProductEventer implements ExceptionHandleContract
{
    protected $mediator;

    final public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }
    public function exceptionTrigger(string $eventName,\Exception $exception) : void{
        $this->mediator->notify($this,$eventName,$exception);
    }
}