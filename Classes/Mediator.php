<?php

namespace Classes;

interface Mediator
{

    /**
     * @param ExceptionHandleContract $sender
     * @param string $event
     * @param mixed $callbackItem
     * @return void
     */
    public function notify(ExceptionHandleContract $sender, string $event,object $callbackItem) : void;
}