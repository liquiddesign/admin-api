<?php

namespace AdminApi\Schema\Types;

use LqGrAphi\Schema\BaseMutation;
use LqGrAphi\Schema\TypeRegister;
use Nette\DI\Container;

class AuthMutation extends BaseMutation
{
	public function __construct(Container $container)
	{
		$resolverName = 'auth';
		/** @var \LqGrAphi\Schema\TypeRegister $typeRegister */
		$typeRegister = $container->getByType(TypeRegister::class);

		parent::__construct($container, [
			'fields' => [
				"{$resolverName}AdminLogin" => [
					'type' => $typeRegister->getOutputType('administrator'),
					'args' => [
						'login' => $typeRegister::nonNull($typeRegister::string()),
						'password' => $typeRegister::nonNull($typeRegister::string()),
					],
					'description' => 'Returns Administrator if login is successful otherwise null',
				],
				"{$resolverName}AdminLogout" => [
					'type' => $typeRegister::nonNull($typeRegister::boolean()),
				],
				"{$resolverName}AdminGet2FAQR" => [
					'type' => $typeRegister::nonNull($typeRegister::boolean()),
					'description' => 'Generates new QR code to register for 2FA.'
				],
				"{$resolverName}AdminSet2FAQR" => [
					'type' => $typeRegister::nonNull($typeRegister::boolean()),
					'description' => 'Enable 2FA with code generated based on QR code.'
				],
				"{$resolverName}AdminLogout" => [
					'type' => $typeRegister::nonNull($typeRegister::boolean()),
				],
			],
		]);
	}
}
