<?php
namespace Ecentura\InternshipTest\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\UrlInterface;

class EcenturaUserForm extends Template
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param UrlInterface $urlBuilder
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $data);
    }

    /**
     * Get form action URL
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->urlBuilder->getUrl('ecentura_internshiptest/ecenturauser/save');
    }
}
