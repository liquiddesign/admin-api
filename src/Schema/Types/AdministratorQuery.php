<?php

namespace AdminApi\Schema\Types;

use Admin\DB\Administrator;
use LqGrAphi\Schema\CrudQuery;

class AdministratorQuery extends CrudQuery
{
	public function getClass(): string
	{
		return Administrator::class;
	}
}
