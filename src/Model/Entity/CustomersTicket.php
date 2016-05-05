<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomersTicket Entity.
 *
 * @property int $id
 */
class CustomersTicket extends Entity
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

    protected $allStatusNames = [
        1 => "open",
        2 => "closed",
        3 => "in progress"
    ];

    protected function _getTicketStatusName(){
        if(array_key_exists($this->_properties["status"],$this->allStatusNames)){
            return $this->allStatusNames[$this->_properties["status"]];
        }
    }

    public function _getAllStatusNames(){
        return $this->allStatusNames;
    }


}
