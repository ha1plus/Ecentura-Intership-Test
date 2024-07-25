<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Ui\Component\Listing\Column;

class EcenturaUserActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    const URL_PATH_DELETE = 'ecentura_internshiptest/ecenturauser/delete';
    const URL_PATH_DETAILS = 'ecentura_internshiptest/ecenturauser/details';
    const URL_PATH_EDIT = 'ecentura_internshiptest/ecenturauser/edit';
    protected $urlBuilder;

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['ecenturauser_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'ecenturauser_id' => $item['ecenturauser_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'ecenturauser_id' => $item['ecenturauser_id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __("Delete '{$item['name']}'"),
                                'message' => __("Are you sure you want to delete '{$item['name']}' record?")
                            ]
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
