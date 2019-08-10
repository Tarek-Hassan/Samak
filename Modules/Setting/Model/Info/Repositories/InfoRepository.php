<?php
namespace Modules\Setting\Model\Info\Repositories;
use Modules\Setting\Model\Info\Info;

class InfoRepository
{
    /**
     * @var Info
     */
    private $Info;
    /**
     * UserRepository constructor.
     * @param Info $Info
     */
    public function __construct(Info $Info)
    {
        $this->Info = $Info;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        return $this->Info->first();
    }

    public function allData()
    {
        return  $this->Info->With('users')->get();
    }



    /**
     * Create a new Info
     *
     * @param array $Info
     * @return mixed
     */
    public function create(array $Info)
    {

        return $this->Info->create($Info);
    }

    /**
     * Find Info by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Info->find($id);
    }

    /**
     * Update Info with id
     *
     * @param string $id
     * @param array $Info
     * @return mixed
     */
    public function update(string $id, array $Info)
    {

        $InfoToUpdate = $this->Info->find($id);
        $InfoToUpdate->update($Info);
        return $InfoToUpdate->fresh();
    }
    /**
     * Delete Info with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
