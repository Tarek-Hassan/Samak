<?php
namespace Modules\CartOrder\Model\Cart\Repositories;
use Modules\CartOrder\Model\Cart\Cart;


class CartRepository
{
    /**
     * @var Cart
     */
    private $Cart;
    /**
     * UserRepository constructor.
     * @param Cart $Cart
     */
    public function __construct(Cart $Cart)
    {
        $this->Cart = $Cart;
        // $this->Cat = $Cat;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        return $this->Cart->where('user_id',auth()->user()->id)->get();
    }
    /**
     * Create a new Cart
     *
     * @param array $Cart
     * @return mixed
     */

    public function create(array $Cart)
    {

        $size=0;$quantity=$Cart['quantity'];$cooked=0;$cutting=0;$cleaned=0;

        if($Cart['size']==2){$size=$Cart['large'];}else if($Cart['size']==1){$size=$Cart['medium'];} else if($Cart['size']==0){$size=$Cart['small'];}

        if($Cart['cutting']==1){$cutting=$Cart['cuttingprice'];}else if($Cart['cutting']==0){$cutting=0;}

                if($Cart['cleaned']==1){$cleaned=$Cart['cleaningprice'];}else if($Cart['cleaned']==0){$cleaned=0;}
                    if($Cart['cooked']==1){$cooked=$Cart['cookingprice'];}else if($Cart['cooked']==0){$cooked=0;}

        $Cart['price']=$size*$quantity+$cooked+$cutting+$cleaned;

        return $this->Cart->create($Cart);

    }


    /**
     * Find Cart by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {

        return $this->Cart->find($id);
    }

    /**
     * Update Cart with id
     *
     * @param string $id
     * @param array $Cart
     * @return mixed
     */
    public function update(string $id, array $Cart)
    {
        $CartToUpdate = $this->Cart->find($id);
        $CartToUpdate->update($Cart);
        return $CartToUpdate->fresh();
    }
    /**
     * Delete Cart with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
