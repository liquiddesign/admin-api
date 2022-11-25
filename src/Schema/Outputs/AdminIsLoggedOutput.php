<?php

namespace AdminApi\Schema\Outputs;

use Admin\DB\Administrator;
use LqGrAphi\Schema\BaseOutput;
use LqGrAphi\Schema\ClassOutput;
use LqGrAphi\Schema\TypeRegister;

class AdminIsLoggedOutput extends BaseOutput implements ClassOutput
{
	public function __construct(TypeRegister $typeRegister)
	{
		$outputType = $typeRegister->getOutputType($this::getClass());

		$fields = $outputType->config['fields'];

		$fields += [
			'tsLastLogin' => $typeRegister->datetime(),
		];

		parent::__construct(['fields' => $fields,]);
	}

	/**
	 * @return class-string<\StORM\Entity>
	 */
	public static function getClass(): string
	{
		return Administrator::class;
	}
}
