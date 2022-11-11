<?php

namespace AdminApi\Resolvers;

use Admin\Administrator;
use GraphQL\Type\Definition\ResolveInfo;
use LqGrAphi\GraphQLContext;
use LqGrAphi\Resolvers\BaseResolver;
use LqGrAphi\Resolvers\Exceptions\BadRequestException;
use Nette\DI\Container;
use Nette\Security\AuthenticationException;

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
	public function adminLogin(array $rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): array
	{
		if ($this->admin->isLoggedIn()) {
			return $this->admin->getIdentity()->toArray();
		}

		try {
			$this->admin->login($args['login'], $args['password'], \Admin\DB\Administrator::class);
		} catch (AuthenticationException $e) {
			throw new BadRequestException($e->getMessage());
		}

		return $this->admin->getIdentity()->toArray();
	}
}
