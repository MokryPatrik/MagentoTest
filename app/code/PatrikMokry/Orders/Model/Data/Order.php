<?php

namespace PatrikMokry\Orders\Model\Data;


use Magento\Framework\DataObject;
use PatrikMokry\Orders\Api\Data\OrderInterface;

class Order extends DataObject implements OrderInterface
{

	/**
	 * @return string
	 */
	public function getStatus()
	{
		return $this->getData('status');
	}

	/**
	 * @param string $status
	 * @return $this
	 */
	public function setStatus($status)
	{
		return $this->setData('status', $status);
	}

	/**
	 * @return string
	 */
	public function getCreatedAt()
	{
		return $this->getData('created_at');
	}

	/**
	 * @param string $createdAt
	 * @return $this
	 */
	public function setCreatedAt($createdAt)
	{
		return $this->setData('created_at', $createdAt);
	}

	/**
	 * @return float
	 */
	public function getBaseGrandTotal()
	{
		return $this->getData('base_grand_total');
	}

	/**
	 * @param float $baseGrandTotal
	 * @return $this
	 */
	public function setBaseGrandTotal($baseGrandTotal)
	{
		return $this->setData('base_grand_total', $baseGrandTotal);
	}

}
