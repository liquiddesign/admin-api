<?php

namespace AdminApi\Schema\Outputs;

use Admin\DB\Administrator;
use LqGrAphi\Schema\BaseOutput;
use LqGrAphi\Schema\TypeRegister;

class AdministratorOutput extends BaseOutput
{
	public function __construct(TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createOutputFieldsFromClass(Administrator::class),
		]);
	}
}
