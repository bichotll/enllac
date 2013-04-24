<?php

namespace Bic\EnllacBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BicEnllacBundle extends Bundle
{
	public function getParent() {
		return 'FOSUserBundle';
	}
}
