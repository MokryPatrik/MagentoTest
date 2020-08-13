<?php
namespace PatrikMokry\Orders\Api;

interface OrderRepositoryInterface
{
	/**
	 * Returns greeting message to user
	 *
	 * @api
	 * @param integer $id Order id
	 * @param string $email Customer email
	 * @return string
	 */
	public function getOrderByIdAndEmail($id, $email);
}
