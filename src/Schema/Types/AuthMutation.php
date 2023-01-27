<?php

namespace AdminApi\Schema\Types;

use GraphQL\Type\Definition\Type;
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
						'login' => Type::nonNull(Type::string()),
						'password' => Type::nonNull(Type::string()),
					],
					'description' => 'Returns Administrator if login is successful otherwise null',
				],
				"{$resolverName}AdminLogout" => [
					'type' => Type::nonNull(Type::boolean()),
				],
				"{$resolverName}AdminGet2FAQR" => [
					'type' => Type::nonNull(Type::boolean()),
					'description' => '@todo Generates new QR code to register for 2FA.',
				],
				"{$resolverName}AdminSet2FAQR" => [
					'type' => Type::nonNull(Type::boolean()),
					'description' => '@todo Enable 2FA with code generated based on QR code.',
				],
				"{$resolverName}AdminLogout" => [
					'type' => Type::nonNull(Type::boolean()),
				],
			],
		]);
	}
}
