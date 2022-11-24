<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerCustomer extends Model
{
    use HasFactory;

    //belongsTo=> many to one
    //hasMany  => one to many

    public function combined_ledger()
    {
        return $this->belongsTo(CombinedLedger::class, 'id');
    }

    /*
    public function combined_ledger()
    {
        return $this->belongsTo(CombinedLedger::class, 'foreign_key', 'local_key');
    }
 
    public function combined_ledger()
   {
      return $this->hasOne(CombinedLedger::class, 'foreign_key', 'local_key');
   }
    
*/
}