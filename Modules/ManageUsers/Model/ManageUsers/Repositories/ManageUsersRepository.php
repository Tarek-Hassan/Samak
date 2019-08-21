<?php
namespace Modules\ManageUsers\Model\ManageUsers\Repositories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use App\User as ManageUsers;
use Hash;
class ManageUsersRepository
{
    /**
     * @var ManageUsers
     */
    private $ManageUsers;
    /**
     * UserRepository constructor.
     * @param ManageUsers $ManageUsers
     */
    public function __construct(ManageUsers $ManageUsers)
    {
        $this->ManageUsers = $ManageUsers;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        return $this->ManageUsers->all();
    }







    /**
     * Create a new ManageUsers
     *
     * @param array $ManageUsers
     * @return mixed
     */
    public function create(array $ManageUsers)
    {
         return $this->ManageUsers->create($ManageUsers);
    }

    /**
     * Find ManageUsers by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->ManageUsers->find($id);
    }

    /**
     * Update ManageUsers with id
     *
     * @param string $id
     * @param array $ManageUsers
     * @return mixed
     */
    public function update(string $id, array $ManageUsers)
    {
        

        $ManageUsersToUpdate = $this->ManageUsers->find($id);
        $ManageUsersToUpdate->update($ManageUsers);
        return $ManageUsersToUpdate->fresh();
    }
    /**
     * Delete ManageUsers with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
