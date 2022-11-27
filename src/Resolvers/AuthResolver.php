<?php

namespace AdminApi\Resolvers;

use Admin\Administrator;
use Admin\DB\AdministratorRepository;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use LqGrAphi\GraphQLContext;
use LqGrAphi\Resolvers\BaseResolver;
use LqGrAphi\Resolvers\Exceptions\BadRequestException;
use LqGrAphi\Resolvers\Exceptions\UnauthorizedException;
use LqGrAphi\Schema\BaseType;
use Nette\DI\Container;
use Nette\Security\AuthenticationException;
use Nette\Utils\Arrays;

class AuthResolver extends BaseResolver
{
	protected readonly Administrator $admin;

	public function __construct(Container $container, private readonly AdministratorRepository $administratorRepository)
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
			/** @var \Admin\DB\Administrator|null $identity */
			$identity = $this->admin->getIdentity();

			if (!$identity) {
				throw new BadRequestException('Identity not found');
			}

			if ($account = $identity->getAccount()) {
				$account->update([
					'tsLastActivity' => Carbon::now()->toDateTimeString(),
				]);
			}

			return Arrays::first($this->fetchResult($this->administratorRepository->many()->where('this.' . BaseType::ID_NAME, $identity->getPK()), $resolveInfo));
		}

		try {
			$this->admin->login($args['login'], $args['password'], \Admin\DB\Administrator::class);

			/** @var \Admin\DB\Administrator|null $identity */
			$identity = $this->admin->getIdentity();

			if (!$identity) {
				throw new BadRequestException('Identity not found');
			}

			if ($account = $identity->getAccount()) {
				$account->update([
					'tsLastLogin' => Carbon::now()->toDateTimeString(),
					'tsLastActivity' => Carbon::now()->toDateTimeString(),
				]);
			}
		} catch (AuthenticationException $e) {
			throw new UnauthorizedException($e->getMessage());
		}

		return Arrays::first($this->fetchResult($this->administratorRepository->many()->where('this.' . BaseType::ID_NAME, $identity->getPK()), $resolveInfo));
	}

	/**
	 * @param array<mixed> $rootValue
	 * @param array<mixed> $args
	 * @param \LqGrAphi\GraphQLContext $context
	 * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo
	 */
	public function adminLogout(array $rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): bool
	{
		if ($this->admin->isLoggedIn()) {
			$this->admin->logout(true);

			return true;
		}

		return false;
	}

	/**
	 * @param array<mixed> $rootValue
	 * @param array<mixed> $args
	 * @param \LqGrAphi\GraphQLContext $context
	 * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo
	 * @return array<mixed>
	 */
	public function adminIsLogged(array $rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): array
	{
		if (!$this->admin->isLoggedIn()) {
			throw new UnauthorizedException('Not logged in');
		}

		/** @var \Admin\DB\Administrator|null $identity */
		$identity = $this->admin->getIdentity();

		if (!$identity || (!$account = $identity->getAccount())) {
			throw new UnauthorizedException('Account not found');
		}

		if (!$account->isActive() || !$account->authorized) {
			throw new UnauthorizedException('Account is not active');
		}

		$adminArray = Arrays::first($this->fetchResult($this->administratorRepository->many()->where('this.uuid', $this->admin->getId()), $resolveInfo));
		$account->update(['tsLastActivity' => Carbon::now()->toDateTimeString(),]);

		return $adminArray;
	}
}
