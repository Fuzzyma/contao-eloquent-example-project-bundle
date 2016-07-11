<?php
/**
 * @author: Ulrich-Matthias Schäfer
 * @creation: 06.07.16 17:55
 * @package: EloquentExampleProjectBundle
 */


namespace Fuzzyma\Contao\EloquentExampleProjectBundle\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{

    protected $guarded = [];
    public $timestamps = false;


    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'tag_topic');
    }
} 