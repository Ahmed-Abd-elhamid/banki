<?php

namespace App\Repository\Repositories;

use App\Models\Account;
use App\Repository\Interfaces\AccountRepositoryInterface;
use Illuminate\Support\Collection;

class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{

   /**
    * AccountRepository constructor.
    *
    * @param Account $model
    */
   public function __construct(Account $model)
   {
       parent::__construct($model);
   }

   public function auth_find($account, $user)
   {
		if(is_null($user) || $account->user_id != $user->id){
         abort(403);
      }
   }

   public function all_by_user($user): Collection
   {
	return $this->model->where('user_id', $user->id)->orderBy('id', 'DESC')->get();
   }

   public function deactivate($account): String
   {
	if($account->is_active){
		$account->update([
			'is_active' => false
		]);
		return 'Deactivated Successfully!';
	}else{
		$account->update([
			'is_active' => true
		]); 
		return 'Activated Successfully!';
	}
   }
}