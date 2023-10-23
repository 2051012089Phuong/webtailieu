<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Document extends Model
{
    use HasFactory;

    protected $fillable=[
        'documentId',
        'documentName',
        'documentFileName',
        'id',
        'typeId',
        'image',
        'name'];
        //dinh dang lai ngay thang xuat ra man hinh
    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
    // }

    //mot document chi thuoc ve mot user

    // public function User()
    // {
    //     return $this->hasMany(Document::class,'id','id');
    // }
}
