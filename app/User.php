<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','unit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rolesUser(){
        return $this->hasMany('App\Models\Admin\MdtRolesUser', 'mdu_user_id', 'id');
    }

    public function selDesc(){
        return $this->hasOne('App\Models\Admin\MdtSel', 'sel_unit', 'unit');
    }

    // public function HreInfo(){
    //     return $this->hasOne('App\Models\Hre\HreMaklumatPeribadi', 'hre_no_tentera', 'email');
    // }

    // public function userPhoto(){
    //     return $this->hasManyThrough('App\Models\Hre\HrePhoto','App\Models\Hre\HreMaklumatPeribadi', 'hre_no_tentera', 'hrp_bio_id','email','hre_hrms_bioID');
    // }

    public function selInfo()
    {
        return $this->belongsTo('App\Models\Admin\MdtSel', 'unit', 'sel_unit');
    }

    // public function staffInfo()
    // {
    //     return $this->belongsTo('App\Models\Hre\HreMaklumatPeribadi', 'email', 'hre_no_tentera');
    // }

    public function PerundanganFolder()
    {
        return $this->hasMany('App\Models\Perundangan\DmsPerundangan','udg_created_by');
    }

    public function PerundanganFile()
    {
        return $this->hasMany('App\Models\Perundangan\DmsPerundanganFile','udf_upload_by');
    }

    public function PendidikanFolder()
    {
        return $this->hasMany('App\Models\Pendidikan\DmsPendidikan','pdd_created_by');
    }

    public function PendidikanFile()
    {
        return $this->hasMany('App\Models\Pendidikan\DmsPendidikannFile','pdf_upload_by');
    }

    public function OpDomestikFolder()
    {
        return $this->hasMany('App\Models\Pendidikan\DmsOpDomestik','opd_created_by');
    }

    public function OpDomestikFile()
    {
        return $this->hasMany('App\Models\Pendidikan\DmsOpDomestikFile','odf_upload_by');
    }

    public function RfiFolder()
    {
        return $this->hasMany('App\Models\RFI\DmsRfi','rfi_created_by');
    }

    public function RfiFile()
    {
        return $this->hasMany('App\Models\RFI\DmsRfiFile','rff_upload_by');
    }

     public function LogistikFolder()
    {
        return $this->hasMany('App\Models\Logistik\DmsLogistik','log_created_by');
    }

    public function LogistikFile()
    {
        return $this->hasMany('App\Models\Logistik\DmsLogistikFile','lof_upload_by');
    }

}
