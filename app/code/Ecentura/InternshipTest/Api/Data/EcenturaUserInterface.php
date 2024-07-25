<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Api\Data;

interface EcenturaUserInterface
{

    const ECENTURAUSER_ID = 'ecenturauser_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const BIRTHDAY = 'birthday';

    /**
     * Get ecenturauser_id
     * @return string|null
     */
    public function getEcenturauserId();

    /**
     * Set ecenturauser_id
     * @param string $ecenturauserId
     * @return \Ecentura\InternshipTest\EcenturaUser\Api\Data\EcenturaUserInterface
     */
    public function setEcenturauserId($ecenturauserId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Ecentura\InternshipTest\EcenturaUser\Api\Data\EcenturaUserInterface
     */
    public function setName($name);

    /**
     * Get birthday
     * @return string|null
     */
    public function getBirthday();

    /**
     * Set birthday
     * @param string $birthday
     * @return \Ecentura\InternshipTest\EcenturaUser\Api\Data\EcenturaUserInterface
     */
    public function setBirthday($birthday);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Ecentura\InternshipTest\EcenturaUser\Api\Data\EcenturaUserInterface
     */
    public function setEmail($email);
}

