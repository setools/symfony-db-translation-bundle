<?php
namespace Setools\Bundle\DbTranslationBundle\Services\Translation;
use Symfony\Bundle\FrameworkBundle\Translation\Translator as BaseTranslator;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Translation\MessageCatalogue;

class Translator extends BaseTranslator
{
    /**
     * {@inheritdoc}
     */
    protected function loadCatalogue($locale)
    {
        parent::loadCatalogue($locale);

        $catalogue = $this->container->get('translation.loader.db')->load('', $locale);
        $this->catalogues[$locale]->addCatalogue($catalogue);
    }
}