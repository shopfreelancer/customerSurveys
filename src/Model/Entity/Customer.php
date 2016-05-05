<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $salutation
 * @property string $companyname
 * @property string $street
 * @property string $postcode
 * @property string $city
 * @property string $country_id
 * @property \App\Model\Entity\Country $country
 * @property string $phone
 * @property string $www
 * @property string $email
 * @property string $ustid
 * @property string $taxnumber
 * @property string $description
 */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getCountryName()
    {
        if(empty($this->_properties['country_id'])) return "";

        $countries = $this->getCountriesListData();
        return $countries[$this->_properties['country_id']];
    }

    protected function _getCountriesList()
    {

        return $this->getCountriesListData();
    }

    public function getCountriesListData()
    {
        return ["Deutschland","Österreich","Schweiz"];
    }


    
}
