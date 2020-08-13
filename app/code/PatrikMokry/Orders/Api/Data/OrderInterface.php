<?php
namespace PatrikMokry\Orders\Api\Data;

interface OrderInterface
{
	/**
	 * @return string
	 */
	public function getStatus();

	/**
	 * @param string $status
	 * @return $this
	 */
	public function setStatus($status);

	/**
	 * @return string
	 */
	public function getCreatedAt();

	/**
	 * @param string $createdAt
	 * @return $this
	 */
	public function setCreatedAt($createdAt);

	/**
	 * @return float
	 */
	public function getBaseGrandTotal();

	/**
	 * @param float $baseGrandTotal
	 * @return $this
	 */
	public function setBaseGrandTotal($baseGrandTotal);
}
