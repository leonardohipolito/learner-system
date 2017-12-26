<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ["name","site","logo"];
    /**
     * Business has many Courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = business_id, localKey = id)
    	return $this->hasMany(Course::class);
    }
}
