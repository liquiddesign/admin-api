<?php

declare(strict_types=1);

namespace AdminApi;

use Nette\DI\Container;

class Application extends \Base\Application
{
	public static function isDebugMode(Container $container): bool
	{
		return isset($container->getParameters()['debugMode']);
	}
}
