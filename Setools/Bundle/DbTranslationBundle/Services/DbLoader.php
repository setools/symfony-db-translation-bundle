<?php
namespace Setools\Bundle\DbTranslationBundle\Services;

use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Loader\LoaderInterface;

class DbLoader implements LoaderInterface
{

    /**
     * @var \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected $doctrine;
    
    /**
     * @param \Doctrine\Bundle\DoctrineBundle\Registry $doctrine
     */
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function load($resource, $locale, $domain = 'messages')
    {
        $em = $this->doctrine->getManager();
        
        $translations = $em->getRepository("SetoolsDbTranslationBundle:Translation")->findBy([
            'locale' => $locale,
        ]);
        
        $catalogue = new MessageCatalogue($locale);
        
        foreach ($translations as $translation) {
            $catalogue->set($translation->getLabel(), $translation->getTranslation(), $translation->getDomain());
        }

        return $catalogue;
    }

}