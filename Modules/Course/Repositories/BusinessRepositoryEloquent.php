<?php

namespace Modules\Course\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Course\Repositories\PostRepository;
use Modules\Course\Entities\Business;
// use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BusinessRepositoryEloquent extends BaseRepository implements BusinessRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Business::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
