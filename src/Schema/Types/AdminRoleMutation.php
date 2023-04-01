<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace AdminApi\Schema\Types;

class AdminRoleMutation extends \LqGrAphi\Schema\CrudMutation
{
	public function getClass(): string
	{
		return \Admin\DB\Role::class;
	}

	public function getCreateInputName(): string
	{
		return 'AdminRoleCreateInput';
	}

	public function getUpdateInputName(): string
	{
		return 'AdminRoleUpdateInput';
	}
}
