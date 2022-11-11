<?php

namespace AdminApi\Resolvers;

use Admin\DB\Administrator;
use LqGrAphi\Resolvers\CrudResolver;

class AdministratorResolver extends CrudResolver
{
	public function getClass(): string
	{
		return Administrator::class;
	}
}
