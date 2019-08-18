<?php
namespace Modules\CartOrder\Model\OrderDetails\Repositories;
use Modules\CartOrder\Model\OrderDetails\OrderDetails;


class OrderDetailsRepository
{
    /**
     * @var OrderDetails
     */
    private $OrderDetails;
    /**
     * UserRepository constructor.
     * @param OrderDetails $OrderDetails
     */
    public function __construct(OrderDetails $OrderDetails)
    {
        $this->OrderDetails = $OrderDetails;
        // $this->Cat = $Cat;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        return $this->OrderDetails->all();
    }
    /**
     * Create a new OrderDetails
     *
     * @param array $OrderDetails
     * @return mixed
     */

    public function create(array $OrderDetails)
    {

        return $this->OrderDetails->create($OrderDetails);

    }


    /**
     * Find OrderDetails by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {

        return $this->OrderDetails->find($id);
    }
    public function showOrderDetails(string $id)
    {
        return $this->OrderDetails->where('order_id',$id)->get();
    }

    /**
     * Update OrderDetails with id
     *
     * @param string $id
     * @param array $OrderDetails
     * @return mixed
     */
    public function update(string $id, array $OrderDetails)
    {
        $OrderDetailsToUpdate = $this->OrderDetails->find($id);
        $OrderDetailsToUpdate->update($OrderDetails);
        return $OrderDetailsToUpdate->fresh();
    }
    /**
     * Delete OrderDetails with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
