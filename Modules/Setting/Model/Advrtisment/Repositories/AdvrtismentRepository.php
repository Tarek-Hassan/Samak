<?php
namespace Modules\Setting\Model\Advrtisment\Repositories;
use Modules\Setting\Model\Advrtisment\Advrtisment;

class AdvrtismentRepository 
{
    /**
     * @var Advrtisment
     */
    private $Advrtisment;
    /**
     * UserRepository constructor.
     * @param Advrtisment $Advrtisment
     */
    public function __construct(Advrtisment $Advrtisment)
    {
        $this->Advrtisment = $Advrtisment;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Advrtisment->all();
    }

    public function allData()
    {
        return  $this->Advrtisment->With('users')->get();
    }


 
    /**
     * Create a new Advrtisment
     *
     * @param array $Advrtisment
     * @return mixed
     */
    public function create(array $Advrtisment)
    {

        return $this->Advrtisment->create($Advrtisment);
    }

    /**
     * Find Advrtisment by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Advrtisment->find($id);
    }

    /**
     * Update Advrtisment with id
     *
     * @param string $id
     * @param array $Advrtisment
     * @return mixed
     */
    public function update(string $id, array $Advrtisment)
    {
       
        $AdvrtismentToUpdate = $this->Advrtisment->find($id);
        $AdvrtismentToUpdate->update($Advrtisment);
        return $AdvrtismentToUpdate->fresh();
    }
    /**
     * Delete Advrtisment with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
