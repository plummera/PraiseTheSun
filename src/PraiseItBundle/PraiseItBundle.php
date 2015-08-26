<?php

namespace PraiseItBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PraiseItBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
