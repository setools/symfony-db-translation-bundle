<?php

namespace Setools\Bundle\DbTranslationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Setools\Bundle\DbTranslationBundle\DependencyInjection\Compiler\DbTranslationInjectPass;

class SetoolsDbTranslationBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new DbTranslationInjectPass());
    }
}
