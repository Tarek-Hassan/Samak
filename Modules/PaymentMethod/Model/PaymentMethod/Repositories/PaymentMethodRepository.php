<?php
namespace Modules\PaymentMethod\Model\PaymentMethod\Repositories;
use Modules\PaymentMethod\Model\PaymentMethod\PaymentMethod;


class PaymentMethodRepository
{
    /**
     * @var PaymentMethod
     */
    private $PaymentMethod;
    /**
     * UserRepository constructor.
     * @param PaymentMethod $PaymentMethod
     */
    public function __construct(PaymentMethod $PaymentMethod)
    {
        $this->PaymentMethod = $PaymentMethod;
        // $this->Cat = $Cat;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        return $this->PaymentMethod->all();
    }
    /**
     * Create a new PaymentMethod
     *
     * @param array $PaymentMethod
     * @return mixed
     */

    public function create(array $PaymentMethod)
    {

        return $this->PaymentMethod->create($PaymentMethod);

    }


    /**
     * Find PaymentMethod by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {

        return $this->PaymentMethod->find($id);
    }

    /**
     * Update PaymentMethod with id
     *
     * @param string $id
     * @param array $PaymentMethod
     * @return mixed
     */
    public function update(string $id, array $PaymentMethod)
    {
        $PaymentMethodToUpdate = $this->PaymentMethod->find($id);
        $PaymentMethodToUpdate->update($PaymentMethod);
        return $PaymentMethodToUpdate->fresh();
    }
    /**
     * Delete PaymentMethod with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
