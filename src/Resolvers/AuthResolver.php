<?php

namespace AdminApi\Resolvers;

use Admin\Administrator;
use GraphQL\Type\Definition\ResolveInfo;
use LqGrAphi\GraphQLContext;
use LqGrAphi\Resolvers\BaseResolver;
use Nette\DI\Container;

class AuthResolver extends BaseResolver
{
	protected readonly Administrator $admin;

	public function __construct(Container $container)
	{
		parent::__construct($container);

		$this->admin = $container->getService('admin.administrator');
	}

	/**
	 * @param array<mixed> $rootValue
	 * @param array<mixed> $args
	 * @param \LqGrAphi\GraphQLContext $context
	 * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo
	 * @return array<mixed>
	 */
	public function login(array $rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): string
	{
		\bdump($this->admin);
	}
}
