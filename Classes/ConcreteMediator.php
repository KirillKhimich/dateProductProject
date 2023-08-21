<?php

namespace Classes;

class ConcreteMediator implements Mediator
{
    private object $component1;
    private object $component2;
    private object $component3;

    public function __construct(CreatorDateProduct $component1,DateProductLogger $component2)
    {
        $this->component1 = $component1;
        $this->component1->setMediator($this);
        $this->component2 = $component2;
        $this->component2->setMediator($this);

    }
    public function notify($sender, $event)
    {
        if ($sender === $this->component1) {
            echo "Component 1 triggered event: $event\n";
            $this->component2->log();
        }
    }
}