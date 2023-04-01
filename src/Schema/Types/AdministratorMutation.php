<?php

namespace AdminApi\Schema\Types;

use Admin\DB\Administrator;
use LqGrAphi\Schema\CrudMutation;

class AdministratorMutation extends CrudMutation
{
	public function getClass(): string
	{
		return Administrator::class;
	}

	public function getCreateInputName(): string
	{
		return 'AdministratorCreateInput';
	}

	public function getUpdateInputName(): string
	{
		return 'AdministratorUpdateInput';
	}
}
