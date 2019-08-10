<?php
namespace Modules\Setting\Model\Privacy\Repositories;
use Modules\Setting\Model\Privacy\Privacy;

class PrivacyRepository
{
    /**
     * @var Privacy
     */
    private $Privacy;
    /**
     * UserRepository constructor.
     * @param Privacy $Privacy
     */
    public function __construct(Privacy $Privacy)
    {
        $this->Privacy = $Privacy;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        // return $this->Privacy->all();
        return $this->Privacy->first();
    }

    public function allData()
    {
        return  $this->Privacy->With('users')->get();
    }



    /**
     * Create a new Privacy
     *
     * @param array $Privacy
     * @return mixed
     */
    public function create(array $Privacy)
    {

        return $this->Privacy->create($Privacy);
    }

    /**
     * Find Privacy by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Privacy->find($id);
    }

    /**
     * Update Privacy with id
     *
     * @param string $id
     * @param array $Privacy
     * @return mixed
     */
    public function update(string $id, array $Privacy)
    {

        $PrivacyToUpdate = $this->Privacy->find($id);
        $PrivacyToUpdate->update($Privacy);
        return $PrivacyToUpdate->fresh();
    }
    /**
     * Delete Privacy with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
