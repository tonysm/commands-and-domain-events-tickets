<?php namespace Acme\Commanding; 

class CommandTranslator
{
    /**
     * @param $command
     * @return string
     */
    public function toHandler($command)
    {
        return preg_replace("/(^.*)Command$/", "$1CommandHandler", get_class($command));
    }
}