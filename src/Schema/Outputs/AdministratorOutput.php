<?php

namespace AdminApi\Schema\Outputs;

use Admin\DB\Administrator;
use LqGrAphi\Schema\BaseOutput;
use LqGrAphi\Schema\ClassOutput;
use LqGrAphi\Schema\TypeRegister;

class AdministratorOutput extends BaseOutput implements ClassOutput
{
	public function __construct(TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createOutputFieldsFromClass($this::getClass()),
		]);
	}

	/**
	 * @return class-string<\StORM\Entity>
	 */
	public static function getClass(): string
	{
		return Administrator::class;
	}
}
