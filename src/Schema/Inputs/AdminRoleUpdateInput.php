<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace AdminApi\Schema\Inputs;

class AdminRoleUpdateInput extends \LqGrAphi\Schema\BaseInput
{
	public function __construct(\LqGrAphi\Schema\TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createCrudUpdateInputFieldsFromClass(\Admin\DB\Role::class),
		]);
	}
}
