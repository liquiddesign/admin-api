<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace AdminApi\Schema\Outputs;

class AdminRoleOutput extends \LqGrAphi\Schema\BaseOutput implements \LqGrAphi\Schema\ClassOutput
{
	public function __construct(\LqGrAphi\Schema\TypeRegister $typeRegister)
	{
		parent::__construct([
			'fields' => $typeRegister->createOutputFieldsFromClass(\Admin\DB\Role::class),
		]);
	}

	/**
	 * @return class-string<\StORM\Entity>
	 */
	public static function getClass(): string
	{
		return \Admin\DB\Role::class;
	}
}
