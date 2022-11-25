<?php

namespace AdminApi\Schema\Types;

use Admin\DB\Administrator;
use LqGrAphi\Schema\BaseQuery;
use LqGrAphi\Schema\TypeRegister;
use Nette\DI\Container;

class AuthQuery extends BaseQuery
{
	public function __construct(Container $container)
	{
		$resolverName = 'auth';
		/** @var \LqGrAphi\Schema\TypeRegister $typeRegister */
		$typeRegister = $container->getByType(TypeRegister::class);

		parent::__construct($container, [
			'fields' => [
				"{$resolverName}AdminIsLogged" => [
					'type' => $typeRegister->getOutputType(Administrator::class),
				],
			],
		]);
	}
}
