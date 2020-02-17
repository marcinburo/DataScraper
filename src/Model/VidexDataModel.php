<?php

namespace App\Model;

/**
 * Class VidexDataModel
 * @package App\Model
 */
class VidexDataModel
{
    /**
     * @var string
     */
    private $optionTitle;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $discount;

    /**
     * @param string $optionTitle
     * @return VidexDataModel
     */
    public function setOptionTitle(string $optionTitle) : VidexDataModel
    {
        $this->optionTitle = $optionTitle;

        return $this;
    }

    /**
     * @param string $description
     * @return VidexDataModel
     */
    public function setDescription(string $description) : VidexDataModel
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $price
     * @return VidexDataModel
     */
    public function setPrice(string $price) : VidexDataModel
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param string $discount
     * @return VidexDataModel
     */
    public function setDiscount(string $discount) : VidexDataModel
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return string
     */
    public function getOptionTitle() : string
    {
        return $this->optionTitle;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDiscount() : string
    {
        return $this->discount;
    }

    /**
     * @return string
     */
    public function getPrice() : string
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'optionTitle'   => $this->optionTitle,
            'description'   => $this->description,
            'discount'      => $this->discount,
            'price'         => $this->price
        ];
    }
}