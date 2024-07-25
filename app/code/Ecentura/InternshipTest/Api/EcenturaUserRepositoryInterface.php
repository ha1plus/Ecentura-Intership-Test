<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface EcenturaUserRepositoryInterface
{

    /**
     * Save EcenturaUser
     * @param \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface $ecenturaUser
     * @return \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface $ecenturaUser
    );

    /**
     * Retrieve EcenturaUser
     * @param string $ecenturauserId
     * @return \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($ecenturauserId);

    /**
     * Retrieve EcenturaUser matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ecentura\InternshipTest\Api\Data\EcenturaUserSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete EcenturaUser
     * @param \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface $ecenturaUser
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Ecentura\InternshipTest\Api\Data\EcenturaUserInterface $ecenturaUser
    );

    /**
     * Delete EcenturaUser by ID
     * @param string $ecenturauserId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ecenturauserId);
}

