<?php

namespace Classes;

class DateProductLogger extends DateProductEventer
{
    private $filename;

    public function __construct($filename)
    {
        parent::__construct();
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function update(string $event,object $data)
    {
        $data = (string)$data;
        $entry = date("Y-m-d H:i:s") . ": '$event' with data '" .json_encode($data) . "'\n";
        file_put_contents($this->filename, $entry, FILE_APPEND);

        echo "Logger: I've written '$event' entry to the log.\n";
    }
}