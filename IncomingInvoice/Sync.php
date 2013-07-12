<?php

/*
 * IncomingInvoice sync class
 */

namespace Moneybird\IncomingInvoice;

use Moneybird\Domainmodel\AbstractModel;
use Moneybird\Mapper\Mapable;
use Moneybird\SyncObject;
use Moneybird\InvalidIdException;

/**
 * IncomingInvoice sync
 */
class Sync extends AbstractModel implements Mapable, SyncObject {
	
	protected $id = array();
	
	/**
	 * Set Id
	 * @param array $value
	 * @throws InvalidIdException
	 */
	protected function setIdAttr(Array $value) {
		if (!is_null($value)) {
			foreach ($value as $id) {
				if (!preg_match('/^[0-9]+$/D', $id)) {
					throw new InvalidIdException('Invalid id: ' . $id);
				}
			}
		}

		$this->id = $value;
	}
}