<?php

namespace App\Repository\Eloquent;

use App\Models\Account;
use App\Repository\AccountRepositoryInterface;
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

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

   public function auth_find($account, $user)
   {
		if(!is_null($user) && $account->user_id == $user->id){
			return response()->view('accounts.show', ['account' => $account]);
		}else{
			return redirect()->route('accounts.index')->with('alert', 'Unauthorized!');
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