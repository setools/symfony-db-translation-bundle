<?php
namespace Setools\Bundle\DbTranslationBundle\Services\Translation;
use Symfony\Bundle\FrameworkBundle\Translation\Translator as BaseTranslator;

class Translator extends BaseTranslator
{
    /**
     * {@inheritdoc}
     */
    protected function loadCatalogue($locale)
    {
        parent::loadCatalogue($locale);

        // After a normal loading has commenced, load database resources 
        $catalogue = $this->container->get('translation.loader.db')->load('', $locale);
        $this->catalogues[$locale]->addCatalogue($catalogue);
    }
}