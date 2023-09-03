<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductModel extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'stocks',
        'price',
        'image',
        'status',
        'production_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at	'
    ];

    public static function activeCount()
    {
        return self::where('status', 1)->count();
    }

    public static function inactiveCount()
    {
        return self::where('status', 2)->count();
    }

    public static function totalProduct()
    {
        return self::count();
    }
}