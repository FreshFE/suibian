<?php namespace App\Auth\Drivers;

class Authorization
{
	protected $userRole;

	protected $roleRules;

	public function __construct($userRole, $roleRules)
	{
		$this->userRole = $userRole;
		$this->roleRules = $roleRules;
	}

	public function check()
	{
		$roleRules = $this->roleRules;
		$rule = $roleRules[$this->userRole];
	}
}