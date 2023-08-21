<?php

namespace Classes;

interface Mediator
{
    public function notify($sender,$event);
}