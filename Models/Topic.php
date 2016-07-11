<?php

namespace Fuzzyma\Contao\EloquentExampleProjectBundle\Models;

use Fuzzyma\Contao\EloquentBundle\Traits\ContaoFilesModelTrait;
use Fuzzyma\Contao\EloquentBundle\Traits\PublishedScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    use ContaoFilesModelTrait; // helps to get and set files in contao
    use PublishedScopeTrait; // now you can access topics like Topics::published()->get()

    // protected $table = "topics"; // in case your table doesn't follow the Laravel convention
    protected $guarded = []; // we allow all attributes to be set with fill()
    public $timestamps = false; // we don't have timestamps but we could add them if we wanted to


    // Note: You can specify the method name for the relation in the dca eloquent array (e.g. 'method' => tags)
    // as default we assume the field name (without _id) from the dca
    // so a field named 'tags' or 'tag_ids' uses method tags while 'tag' or 'tag_id' uses tag as method


    // belongsToMany relation (manyToMany)
    // in our case: one Topic has multiple Tags while one Tag has multiple Topics
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_topic'); // you may want to name the pivot table here
    }

    // hasMany relation
    // in our case: one Topic hasMany pieces of information
    public function infos()
    {
        return $this->hasMany(Info::class);
    }

    // belongsTo relation
    // in our case: one Topic belongsTo one User
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id'); // you may want to name the foreignKey here
    }

    // hasOne relation
    // in our case: one Topic hasOne audio file
    public function audio()
    {
        return $this->hasOne(Audio::class);
    }



    // here the ContaoFilesModelTrait comes into place.
    // The Mutator will convert a call to $topic->thumbnail to a contao file model
    // of course that only works if you defined a field thumbnail in the dca
    public function getThumbnailAttribute($uuid)
    {
        return $this->getContaoFile($uuid);
    }

    // same for setting a new file. Pass a FileModel, an UUID string or just binary
    public function setThumbnailAttribute($file)
    {
        return $this->setContaoFile($file);
    }

}