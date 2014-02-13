<?php
$this->startSetup();
$this->getConnection()->addColumn(
    $this->getTable('customer/customer_group'),
    'approved_methods',
    'varchar(255) not null'
);
$this->endSetup();