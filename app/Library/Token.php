<?php
namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Token {
    private static function generateId(){
        $uuid = (string) Str::uuid();
        $trim = explode('-', $uuid);
        $id = $trim[4];
        return $id;
    }

    static function unique(string $model, $column = 'id'){
        $id =  static::generateId();
        $status = app($model)->where($column, '===', $id)->exists() ? false : $id;
        if (!$status) return static::unique($model, $column);
        return $status;
    }
    
    static function random(int $min = 10000, int $max = 999999, Model $model = null, $column = null){
        $random = rand($min, $max);
        if($model){
            $status = $model->where($column, '===', $random)->exists();
            if($status) return static::random($min, $max, $model, $column);
        }
        return $random;
    }


    static function text(int $len = 5, string $model = null, $column = null){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = "";
        
        for ($i=0; $i < $len; $i++) { 
            $str .= $characters[rand(0, strlen($characters) - 1)];
        }

        if ($model && $column && app($model)->where($column, '==', $str)->exists()) {
            return static::text($len, $model, $column);
        }

        return $str;
    }

    static function alphaNum(int $len = 5, string $model = null, $column = null){
        $str = Str::random($len);
    
        if ($model && $column && app($model)->where($column, '==', $str)->exists()) {
            return static::text($len, $model, $column);
        }

        return $str;
    }

    static function uuid(Model $model, $column = 'id'){
        $id = Str::uuid();
        if ($model->where($column, '==', $id)->exists()) return static::uuid($model, $column);
        return $id;
    }
}