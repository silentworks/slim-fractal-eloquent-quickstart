<?php
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Illuminate\Database\Query\Builder select($columns)
 * @method static Illuminate\Database\Query\Builder where(\string $column, \string $operator = null, \mixed $value = null, \string $boolean = 'and')
 * @method static Illuminate\Database\Query\Builder whereNotExists(\Closure $callback, $boolean = 'and')
 * @method static Illuminate\Database\Query\Builder join($table, $first, $operator, $second, $type = 'inner')
 * @method static Illuminate\Database\Query\Builder remove($id)
 * @method Illuminate\Database\Eloquent\Collection\Builder get(array $columns)
 * @method static Model find()
 * @method Model toArray()
 */
class Eloquent extends Model
{
    /**
     * Set created_by and updated_by to the current logged in user
     */
    public static function boot()
    {
        parent::boot();

        // Setup event bindings...
        static::creating(function ($model) {

        });

        static::updating(function ($model) {

        });
    }

    /**
     * Set value for id column to integer
     * @param $value
     * @return int
     */
    public function getIdAttribute($value)
    {
        return (int) $value;
    }

    /**
     * Set value for created_by column to integer
     * @param $value
     * @return int
     */
    public function getCreatedByAttribute($value)
    {
        return (int) $value;
    }

    /**
     * Set value for updated_by column to integer
     * @param $value
     * @return int
     */
    public function getUpdatedByAttribute($value)
    {
        return (int) $value;
    }
}
