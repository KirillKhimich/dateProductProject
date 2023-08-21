<?php

namespace Classes;

class ConcreteMediator implements Mediator
{
    private object $component1;
    private object $component2;
    private object $component3;
    private object $component4;

    public function __construct(CreatorDateProduct $component1,DateProductLogger $component2,FinderDateProduct $component3)
    {
        $this->component1 = $component1;
        $this->component1->setMediator($this);
        $this->component2 = $component2;
        $this->component2->setMediator($this);
        $this->component3 = $component3;
        $this->component3->setMediator($this);

    }
    public function notify($sender,$event,$callbackItem = "")
    {
        if ($sender === $this->component1) {
            $this->component2->update($event,$callbackItem);
        }
        if ($sender === $this->component3) {
            $this->component2->update($event,$callbackItem);
        }
    }
}