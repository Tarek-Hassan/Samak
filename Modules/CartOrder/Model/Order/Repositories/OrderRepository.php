<?php
namespace Modules\CartOrder\Model\Order\Repositories;
use Modules\CartOrder\Model\Order\Order;
use Modules\CartOrder\Model\OrderDetails\Repositories\OrderDetailsRepository;


class OrderRepository
{
    /**
     * @var Order
     */
    private $Order,$OrderDetails;
    /**
     * UserRepository constructor.
     * @param Order $Order
     */
    public function __construct(Order $Order,OrderDetailsRepository $OrderDetails)
    {
        $this->Order = $Order;
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
        // dd($Order);
        $order=$this->Order->create($Order);

        foreach ($Order['cart'] as $carts) {
            $cart=json_decode($carts,true);
            $this->OrderDetails->create(['quantity'=>$cart['quantity'],'price'=>$cart['price'],'size'=>$cart['size'],'cooked'=>$cart['cooked'],'cutting'=>$cart['cutting'],'cleaned'=>$cart['cleaned'],'categorydetails_id'=>$cart['categorydetails_id'],'order_id'=>$order->id]);
        }
        return $order;

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
