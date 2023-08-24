<?php

namespace Classes;

class ExceptionHandleMediator implements Mediator
{

    private object $creator;
    private object $logger;
    private object $finder;

    public function __construct(ExceptionHandleContract $creator, ExceptionHandleContract $logger, ExceptionHandleContract $finder)
    {
        $this->creator = $creator;
        $this->creator->setMediator($this);
        $this->logger = $logger;
        $this->logger->setMediator($this);
        $this->finder = $finder;
        $this->finder->setMediator($this);

    }

    public function notify(ExceptionHandleContract $sender, string $event, object $callbackItem) : void
    {
        if ($sender === $this->creator) {
            $this->logger->update($event,$callbackItem);
        }
        elseif($sender === $this->finder) {
            $this->logger->update($event,$callbackItem);
        }
    }
}