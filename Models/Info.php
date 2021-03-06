<?php
/**
 * @author: Ulrich-Matthias Schäfer
 * @creation: 07.07.16 23:46
 * @package: EloquentExampleProjectBundle
 */

namespace Fuzzyma\Contao\EloquentExampleProjectBundle\Models;


use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    protected $guarded = [];
    public $timestamps = false;

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}