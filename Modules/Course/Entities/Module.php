<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ["name","course_id"];
    /**
     * Module belongs to Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
    	// belongsTo(RelatedModel, foreignKey = course_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Course::class);
    }
    /**
     * Module has many Files.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = module_id, localKey = id)
        return $this->hasMany(File::class);
    }
}
