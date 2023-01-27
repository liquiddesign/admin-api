<?php

namespace AdminApi\Schema\Inputs;

use Admin\DB\Administrator;
use LqGrAphi\Schema\BaseInput;
use LqGrAphi\Schema\BaseType;
use LqGrAphi\Schema\ClassInput;
use LqGrAphi\Schema\TypeRegister;

class AdministratorInput extends BaseInput implements ClassInput
{
	public function __construct(TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createRelationInputFieldsFromClass(Administrator::class, forceOptional: [BaseType::ID_NAME], includeId: true),
		]);
	}

	public static function getClass(): string
	{
		return Administrator::class;
	}
}
