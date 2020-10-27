<?php
namespace App\Repository;

use App\Models\Transaction;
use Illuminate\Support\Collection;

interface TransactionRepositoryInterface
{
   public function all(): Collection;
}