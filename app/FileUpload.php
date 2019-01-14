<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = "file_upload";
    public $primaryKey = "id";
    public $timestamps = "true";
    protected $fillable = [
        'user_id','amfi_file', 'photo', 'sign',
    ];

    //Sub Broker Details
    public function sub_broker()
    {
        return $this->belongsTo('App\SubBroker');
    }

}
