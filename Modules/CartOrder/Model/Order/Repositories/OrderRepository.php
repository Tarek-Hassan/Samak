<?php
namespace Modules\CartOrder\Model\Order\Repositories;
use Modules\CartOrder\Model\Order\Order;


class OrderRepository
{
    /**
     * @var Order
     */
    private $Order;
    /**
     * UserRepository constructor.
     * @param Order $Order
     */
    public function __construct(Order $Order)
    {
        $this->Order = $Order;
        // $this->Cat = $Cat;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        return $this->Order->all();
    }
    /**
     * Create a new Order
     *
     * @param array $Order
     * @return mixed
     */

    public function create(array $Order)
    {

        return $this->Order->create($Order);

    }


    /**
     * Find Order by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {

        return $this->Order->find($id);
    }

    /**
     * Update Order with id
     *
     * @param string $id
     * @param array $Order
     * @return mixed
     */
    public function update(string $id, array $Order)
    {
        $OrderToUpdate = $this->Order->find($id);
        $OrderToUpdate->update($Order);
        return $OrderToUpdate->fresh();
    }
    /**
     * Delete Order with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
