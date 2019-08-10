<?php
namespace Modules\Setting\Model\AboutUs\Repositories;
use Modules\Setting\Model\AboutUs\AboutUs;

class AboutUsRepository
{
    /**
     * @var AboutUs
     */
    private $AboutUs;
    /**
     * UserRepository constructor.
     * @param AboutUs $AboutUs
     */
    public function __construct(AboutUs $AboutUs)
    {
        $this->AboutUs = $AboutUs;
    }
    /**
     * Return all users
     *
     * @return mixed
     */

    public function all()
    {
        // return $this->AboutUs->all();
        return $this->AboutUs->first();
    }

    public function allData()
    {
        return  $this->AboutUs->With('users')->get();
    }



    /**
     * Create a new AboutUs
     *
     * @param array $AboutUs
     * @return mixed
     */
    public function create(array $AboutUs)
    {

        return $this->AboutUs->create($AboutUs);
    }

    /**
     * Find AboutUs by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->AboutUs->find($id);
    }

    /**
     * Update AboutUs with id
     *
     * @param string $id
     * @param array $AboutUs
     * @return mixed
     */
    public function update(string $id, array $AboutUs)
    {
        $AboutUsToUpdate = $this->AboutUs->find($id);
        $AboutUsToUpdate->update($AboutUs);
        return $AboutUsToUpdate->fresh();
    }
    /**
     * Delete AboutUs with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
