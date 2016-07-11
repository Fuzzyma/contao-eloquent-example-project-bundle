<?php
/**
 * @author: Ulrich-Matthias Schäfer
 * @creation: 07.07.16 23:41
 * @package: EloquentExampleProjectBundle
 */

namespace Fuzzyma\Contao\EloquentExampleProjectBundle\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = "user";
    protected $guarded = [];
    public $timestamps = false;

    public function topics()
    {
        $this->hasMany(Topic::class);
    }
}