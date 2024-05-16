<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class System extends Model
{
    protected $table = 'level_setting'; // Specify the table name if it's different from the plural form of the model name
    protected $primaryKey = 'id'; // Specify the primary key if it's different from 'id'
    public $timestamps = false;
    public function getData()
    {


        return System::all();
    }
}
