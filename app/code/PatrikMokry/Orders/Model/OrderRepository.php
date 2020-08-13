<?php
namespace PatrikMokry\Orders\Model;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\NotFoundException;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Model\OrderRepository as AbstractOrderRepository;
use PatrikMokry\Orders\Api\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

	/** @var AbstractOrderRepository $orderRepository */
	protected $orderRepository;

	/** @var SearchCriteriaBuilder $searchCriteriaBuilder */
	protected $searchCriteriaBuilder;

	public function __construct(
		AbstractOrderRepository $orderRepository,
		SearchCriteriaBuilder $searchCriteriaBuilder
	)
	{
		$this->orderRepository = $orderRepository;
		$this->searchCriteriaBuilder = $searchCriteriaBuilder;
	}

	/**
	 * Returns greeting message to user
	 *
	 * @api
	 * @param string $id Order id
	 * @param string $email Customer email
	 * @throws NotFoundException
	 */
	public function getOrderByIdAndEmail($id, $email)
	{
		$searchCriteria = $this->searchCriteriaBuilder
			->addFilter('entity_id', $id)
			->addFilter('customer_email', $email)
			->setPageSize(1)
			->setCurrentPage(1)
			->create();

		$list = $this->orderRepository->getList($searchCriteria);
		/** @var OrderInterface $order */
		$order = current($list->getItems());

		if (!empty($order)) {
			echo json_encode([
				'price' => $order->getBaseGrandTotal(),
				'status' => $order->getStatus(),
				'created_at' => $order->getCreatedAt()
			]);
		} else {
			throw new NotFoundException(__('OOps.'));
		}
	}
}
