<?php

namespace Classes;

class DateProductEventer
{
    protected $mediator;

    public function __construct(Mediator $mediator = null)
    {
        $this->mediator = $mediator;
    }

    final public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }
    public function exceptionTrigger($event,\Exception $exception) : void{
        $this->mediator->notify($this,$event,$exception);
    }
}