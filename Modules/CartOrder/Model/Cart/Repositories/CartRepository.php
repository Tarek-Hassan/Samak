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
        return $this->Cart->all();
    }
    /**
     * Create a new Cart
     *
     * @param array $Cart
     * @return mixed
     */

    public function create(array $Cart)
    {

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
