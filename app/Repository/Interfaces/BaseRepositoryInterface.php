<?php 
namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface BaseRepositoryInterface
* @package App\Repositories
*/
interface BaseRepositoryInterface
{
   public function all(): Collection;
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}