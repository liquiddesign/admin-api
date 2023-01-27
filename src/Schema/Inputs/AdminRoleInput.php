<?php

namespace AdminApi\Schema\Inputs;

use Admin\DB\Role;
use LqGrAphi\Schema\BaseInput;
use LqGrAphi\Schema\BaseType;
use LqGrAphi\Schema\ClassInput;
use LqGrAphi\Schema\TypeRegister;

class AdminRoleInput extends BaseInput implements ClassInput
{
	public function __construct(TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createRelationInputFieldsFromClass(Role::class, forceOptional: [BaseType::ID_NAME], includeId: true),
		]);
	}

	public static function getClass(): string
	{
		return Role::class;
	}
}
