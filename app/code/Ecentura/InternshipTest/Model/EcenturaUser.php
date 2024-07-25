<?php
/**
 * Copyright © © Ecentura 2024 All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ecentura\InternshipTest\Model;

use Ecentura\InternshipTest\Api\Data\EcenturaUserInterface;
use Magento\Framework\Model\AbstractModel;

class EcenturaUser extends AbstractModel implements EcenturaUserInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Ecentura\InternshipTest\Model\ResourceModel\EcenturaUser::class);
    }

    /**
     * @inheritDoc
     */
    public function getEcenturauserId()
    {
        return $this->getData(self::ECENTURAUSER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEcenturauserId($ecenturauserId)
    {
        return $this->setData(self::ECENTURAUSER_ID, $ecenturauserId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getBirthday()
    {
        return $this->getData(self::BIRTHDAY);
    }

    /**
     * @inheritDoc
     */
    public function setBirthday($birthday)
    {
        return $this->setData(self::BIRTHDAY, $birthday);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
}

