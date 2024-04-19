<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'last_name',
        'first_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];

    public static $rules = array(
        'category_id' => 'required',
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'gender' => 'required',
        'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'tell' => 'required|regix:/^\d(11)$/',
        'address' => 'required|string|max:255',
        'building' => 'nullable',
        'detail' => 'required|max:120'
    );
 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // キーワード検索
    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)){
            $query->where(function($q) use ($keyword) {
            $q->where('name', 'like', '%' . $keyword . '%')
              ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
    }

    // 性別検索
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {

            $query->where('gender', $gender);
        }
    }

    // カテゴリー検索
    public function scopeCategorySearch($query, $category)
    {
        if (!empty($category)) {

            $query->where('category_id', $category);
        }
    }

    // 日付検索
    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {

            $query->whereDate('created_at', $date);
        }
    }



}
