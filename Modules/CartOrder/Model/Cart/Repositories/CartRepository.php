<?php
namespace Modules\CartOrder\Model\Cart\Repositories;
use Modules\CartOrder\Model\Cart\Cart;
use Modules\Category\Model\CategoryDetails\Repositories\CategoryDetailsRepository;
use Modules\Setting\Model\Info\Repositories\InfoRepository;


class CartRepository
{
    /**
     * @var Cart
     */
    private $Cart,$CategoryDetails;
    /**
     * UserRepository constructor.
     * @param Cart $Cart
     */
    public function __construct(Cart $Cart,CategoryDetailsRepository $CategoryDetails,InfoRepository $setting)
    {
        $this->Cart = $Cart;
        $this->CategoryDetails = $CategoryDetails;
        $this->setting = $setting;
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

    public function allData(string $id)
    {
       return $this->Cart->where('user_id',$id)->get();
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


    public function createapi(string $id,array $Cart)
    {

        $CategoryDetails=$this->CategoryDetails->findcategoryDetails($id);
        $setting=$this->setting->info();
        $size=0;$quantity=$Cart['quantity'];$cooked=0;$cutting=0;$cleaned=0;
        $Cart['categorydetails_id']=$id;
        if($Cart['size']==2){$size=$CategoryDetails['large'];}else if($Cart['size']==1){$size=$CategoryDetails['medium'];} else if($Cart['size']==0){$size=$CategoryDetails['small'];}

        if($Cart['cutting']==1){$cutting=$setting['cuttingprice'];}else if($Cart['cutting']==0){$cutting=0;}
if($Cart['cleaned']==1){$cleaned=$setting['cleaningprice'];}else if($Cart['cleaned']==0){$cleaned=0;}
if($Cart['cooked']==1){$cooked=$setting['cookingprice'];}else if($Cart['cooked']==0){$cooked=0;}
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

    public function findCategoryDetails(string $id)
    {
        return $this->Cart->where('user_id',$id)->get();
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
