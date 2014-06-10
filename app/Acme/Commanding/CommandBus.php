<?php namespace Acme\Commanding; 

use Illuminate\Foundation\Application;

class CommandBus
{
    /**
     * @var CommandTranslator
     */
    private $translator;

    /**
     * @var \Illuminate\Foundation\Application
     */
    private $container;

    /**
     * @param CommandTranslator $translator
     * @param Application $container
     */
    function __construct(CommandTranslator $translator, Application $container)
    {
        $this->translator = $translator;
        $this->container = $container;
    }

    /**
     * @param $command
     * @return mixed
     * @throws \Exception
     */
    public function execute($command)
    {
        $handler_class = $this->translator->toHandler($command);

        if ( ! class_exists($handler_class))
        {
            $message = "Handler {$handler_class} not found";
            throw new \Exception($message);
        }

        return $this->container->make($handler_class)->handle($command);
    }
} 