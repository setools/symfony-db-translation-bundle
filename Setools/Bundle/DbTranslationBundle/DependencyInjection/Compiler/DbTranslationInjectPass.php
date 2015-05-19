<?php

namespace Setools\Bundle\DbTranslationBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class DbTranslationInjectPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $bundleConfiguration = $container->getExtension('setools_db_translation')->getBundleConfig();

        if (!$bundleConfiguration) {
            return;
        }

        $localesList = isset($bundleConfiguration['locales']) ? $bundleConfiguration['locales'] : [];

        if (!$localesList) {
            return;
        }

        $translator = $container->findDefinition('translator');
        foreach ($localesList as $locale) {
            $translator->addMethodCall('addResource', ['db', 'db', $locale]);
        }

        return;
    }
}
