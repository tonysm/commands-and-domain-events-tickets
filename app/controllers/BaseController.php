<?php

use Acme\Commanding\CommandBus;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    /**
     * @var CommandBus
     */
    protected $commandBus;

    function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    /**
     * @param string $view
     * @param array $data = []
     * @return mixed
     */
    protected function render($view, array $data = [])
    {
        return View::make($view, $data);
    }

    /**
     * @param $route
     * @param $id
     * @return mixed
     */
    protected function redirectRoute($route, $id)
    {
        return Redirect::route($route, $id);
    }
}
