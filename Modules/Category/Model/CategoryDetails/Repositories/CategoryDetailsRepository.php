<?php
namespace Modules\Category\Model\CategoryDetails\Repositories;
use Modules\Category\Model\CategoryDetails\CategoryDetails;
use Modules\Category\Entities\Image;
use Modules\Category\Entities\RateCategory;
use Auth;
use DB;


class CategoryDetailsRepository
{
    /**
     * @var CategoryDetails
     */
    private $CategoryDetails;
    /**
     * UserRepository constructor.
     * @param CategoryDetails $CategoryDetails
     */
    public function __construct(CategoryDetails $CategoryDetails )
    {
        $this->CategoryDetails = $CategoryDetails;
    }
    /**
     * Return all users
     *
     * @return mixed
     */



/**
 * Unfavorite a particular post
 *
 * @param  Post $post
 * @return Response
 */

    // this two function to  End::favourate or unfavourate


    public function all()
    {
        return $this->CategoryDetails->all();

        // return $this->CategoryDetails->with('rate')->get();
    }
    public function allData()
    {
        return $this->CategoryDetails->with('image')->with('rate')->get();

    }

    /**
     * Create a new CategoryDetails
     *
     * @param array $CategoryDetails
     * @return mixed
     */

    public function create(array $CategoryDetails)
    {


        $data = $this->CategoryDetails->create($CategoryDetails);

        foreach ($CategoryDetails['image'] as $item) {
            Image::create(['image'=>$item,'categorydetails_id'=>$data->id]);
        }
            RateCategory::create(['rate'=>$CategoryDetails['rate'],'categorydetails_id'=>$data->id,'user_id'=>Auth::user()->id]);

        return $data->save();

    }

    public function addRate(string $id,array $CategoryDetails)
    {
        $rate=RateCategory::where('categorydetails_id',$id)->where('user_id',$CategoryDetails['user_id'])->get();
        if(count($rate)){ $rate= DB::table('rate_categories')
            ->where('categorydetails_id',$id)->where('user_id',$CategoryDetails['user_id'])
            ->update(['rate' => $CategoryDetails['rate']]);}else{
             $rate=RateCategory::create(['rate'=>$CategoryDetails['rate'],'categorydetails_id'=>$id,'user_id'=>$CategoryDetails['user_id']]);}
             return $rate;
    }


    /**
     * Find CategoryDetails by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
         $CategoryDetails=$this->CategoryDetails->where('category_id',$id)->get();
        return $CategoryDetails;
    }
    public function findcategoryDetails(string $id)
    {
         $CategoryDetails=$this->CategoryDetails->where('id',$id)->with('image')->with('rate')->first();
        return $CategoryDetails;
    }

    /**
     * Update CategoryDetails with id
     *
     * @param string $id
     * @param array $CategoryDetails
     * @return mixed
     */

    public function update(string $id, array $CategoryDetails)
    {dd($CategoryDetails);
        if ($CategoryDetails['rate'] != [])
            {
                DB::table('rate_categories')
                ->where('categorydetails_id',$id)->where('user_id',Auth::user()->id)
                ->update(['rate' => $CategoryDetails['rate']]);

             }
             if ($CategoryDetails['image'] != []) {
                $images = Image::where('categorydetails_id',$id);
                foreach ($images as $image) {
                    $image->delete();
                }

                foreach ($CategoryDetails['image'] as $item) {
                    Image::create(['image'=>$item,'categorydetails_id'=>$id]);
                }
            }
        $CategoryDetailsToUpdate = $this->CategoryDetails->find($id);
        $CategoryDetailsToUpdate->update($CategoryDetails);
        return $CategoryDetailsToUpdate->fresh();
    }
    /**
     * Delete CategoryDetails with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }

}
