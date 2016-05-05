<?php
use Migrations\AbstractMigration;

class CreateCompanies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('companies');
        $table->addColumn('firstname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('lastname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('salutation', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('companyname', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('street', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('postcode', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('city', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('county_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('phone', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('www', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('ustid', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('taxnumber', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}

/**
 * SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`firstname` varchar(50) DEFAULT NULL,
`lastname` varchar(50) DEFAULT NULL,
`salutation` varchar(30) DEFAULT NULL,
`companyname` varchar(50) DEFAULT NULL,
`street` varchar(100) DEFAULT NULL,
`postcode` varchar(10) DEFAULT NULL,
`city` varchar(70) DEFAULT NULL,
`country` varchar(100) DEFAULT NULL,
`fax` varchar(80) DEFAULT NULL,
`phone` varchar(80) DEFAULT NULL,
`email` varchar(100) DEFAULT NULL,
`www` varchar(100) DEFAULT NULL,
`ustid` varchar(50) DEFAULT NULL,
`taxnumber` varchar(50) DEFAULT NULL,
`description` longtext,
`bankaccountholder` varchar(50) DEFAULT NULL,
`bankaccountnumber` varchar(50) DEFAULT NULL,
`bankaccountcode` varchar(50) DEFAULT NULL,
`bankaccountiban` varchar(50) DEFAULT NULL,
`bankaccountswift` varchar(50) DEFAULT NULL,
`bankname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`billingaddress` varchar(50) DEFAULT NULL,
`created` datetime DEFAULT NULL,
`modified` datetime DEFAULT NULL,
`emailsignature` mediumtext NOT NULL,
`email_sie` mediumtext NOT NULL,
`email_du` mediumtext NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

 */
