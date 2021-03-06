<?php namespace App\Repositories;

use App\Category;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use App\Repositories\FindOrFail;
use App\Repositories\CacheableQuery;

class CategoryRepository extends Repository
{
    use FindOrFail, CacheableQuery;
    
    /**
     * Returns the model to be used by the repository
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Returns all resources
     *
     * @param array $columns
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*'])
    {
        return $this->cache('categories', 60, $this->model->all($columns));
    }
}
