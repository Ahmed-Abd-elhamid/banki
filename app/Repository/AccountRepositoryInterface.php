<?php
namespace App\Repository;

use App\Models\Account;
use Illuminate\Support\Collection;

interface AccountRepositoryInterface
{
   public function all(): Collection;
}