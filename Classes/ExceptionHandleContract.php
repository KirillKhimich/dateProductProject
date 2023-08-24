<?php

namespace Classes;

interface ExceptionHandleContract
{
    /**
     * contract for using mediator by classes that need custom handle exceptions
     * @param Mediator $mediator
     * @return void
     */
    public function setMediator(Mediator $mediator): void;

    /**
     * @param string $eventName
     * @param \Exception $exception
     * @return void
     */
    public function exceptionTrigger(string $eventName, \Exception $exception) : void;
}