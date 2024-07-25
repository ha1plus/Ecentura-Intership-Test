<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Api\Data;

interface EcenturaUserSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get EcenturaUser list.
     * @return \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

