<?php
namespace Modules\CartOrder\Model\Order\Repositories;
use Modules\CartOrder\Model\Order\Order;
use Modules\CartOrder\Model\OrderDetails\Repositories\OrderDetailsRepository;
use Modules\CartOrder\Model\Cart\Repositories\CartRepository;


class OrderRepository
{
    /**
     * @var Order
     */
    private $Order,$OrderDetails,$Cart;
    /**
     * UserRepository constructor.
     * @param Order $Order
     */
    public function __construct(CartRepository $Cart,Order $Order,OrderDetailsRepository $OrderDetails)
    {
        $this->Order = $Order;
        $this->Cart = $Cart;
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
        return $this->Order->with('orderdetails')->get();
    }

    public function allorders(string $id)
    {
        return $this->Order->where('user_id',$id)->with('orderdetails')->get();
    }

    public function searchorder(string $id)
    {
        return $this->Order->where('status',$id)->with('orderdetails')->get();
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
            $Order['totalprice']+=$cart['price'];
            $this->OrderDetails->create(['quantity'=>$cart['quantity'],'price'=>$cart['price'],'size'=>$cart['size'],'cooked'=>$cart['cooked'],'cutting'=>$cart['cutting'],'cleaned'=>$cart['cleaned'],'categorydetails_id'=>$cart['categorydetails_id'],'order_id'=>$order->id]);
        }
        return $order;
        // return $Order;

    }





    public function createapi(array $Order)
    {
        // dd($Order);
        $order=$this->Order->create($Order);
        $cart=$this->Cart->allData($Order['user_id']);


        foreach ($cart as $carts) {
            $cart=json_decode($carts,true);
            $order['totalprice']+=$cart['price'];
            $this->OrderDetails->create(['quantity'=>$cart['quantity'],'price'=>$cart['price'],'size'=>$cart['size'],'cooked'=>$cart['cooked'],'cutting'=>$cart['cutting'],'cleaned'=>$cart['cleaned'],'categorydetails_id'=>$cart['categorydetails_id'],'order_id'=>$order->id]);
        }
        return $order;
        // return $Order;

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
