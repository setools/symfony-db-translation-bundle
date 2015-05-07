<?php

namespace Setools\Bundle\DbTranslationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Setools\Bundle\DbTranslationBundle\Entity\Translation
 *
 * @ORM\Table(indexes={
 *  @ORM\Index(name="domain", columns={"domain"}),
 *  @ORM\Index(name="locale", columns={"locale"}),
 *  @ORM\Index(name="label", columns={"label"}),
 * })
 * @ORM\Entity(repositoryClass="Setools\Bundle\DbTranslationBundle\Entity\TranslationRepository")
 */
class Translation
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $domain
     *
     * @ORM\Column(name="domain", type="string", length=255)
     */
    protected $domain;

    /**
     * @var string $locale
     *
     * @ORM\Column(name="locale", type="string", length=10)
     */
    protected $locale;

    /**
     * @var string $label
     *
     * @ORM\Column(name="label", type="string", length=255)
     */
    protected $label;

    /**
     * @var string $translation
     *
     * @ORM\Column(name="translation", type="text")
     */
    protected $translation;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     *
     * @return Translation
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return Translation
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return Translation
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * @param string $translation
     *
     * @return Translation
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;

        return $this;
    }

}