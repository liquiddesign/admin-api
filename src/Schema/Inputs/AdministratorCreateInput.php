<?php

namespace AdminApi\Schema\Inputs;

use Admin\DB\Administrator;
use LqGrAphi\Schema\BaseInput;
use LqGrAphi\Schema\TypeRegister;

class AdministratorCreateInput extends BaseInput
{
	public function __construct(TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createInputFieldsFromClass(Administrator::class, includeId: false,),
		]);
	}
}