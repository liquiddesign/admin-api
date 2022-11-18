<?php

namespace AdminApi;

class GeneratorScripts extends \LqGrAphi\GeneratorScripts
{
	public static function generate(\Composer\Script\Event $event): void
	{
		$types = [
			'adminRole' => \Admin\DB\Role::class,
		];

		self::generateOutputs($types, __DIR__ . '/Schema/Outputs', 'AdminApi\\Schema\\Outputs');
		self::generateCreateInputs($types, __DIR__ . '/Schema/Inputs', 'AdminApi\\Schema\\Inputs');
		self::generateUpdateInputs($types, __DIR__ . '/Schema/Inputs', 'AdminApi\\Schema\\Inputs');
		self::generateCrudQueries($types, __DIR__ . '/Schema/Types', 'AdminApi\\Schema\\Types');
		self::generateCrudMutations($types, __DIR__ . '/Schema/Types', 'AdminApi\\Schema\\Types');
		self::generateCrudResolvers($types, __DIR__ . '/Resolvers', 'AdminApi\\Resolvers');
	}
}
