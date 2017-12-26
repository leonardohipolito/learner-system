<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["name","description","price","photo","business_id","category_id"];
    /**
     * Course belongs to Business.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
    	// belongsTo(RelatedModel, foreignKey = business_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Business::class);
    }
    /**
     * Course belongs to Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
    	// belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Category::class);
    }
    /**
     * Course has many Modules.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = course_id, localKey = id)
        return $this->hasMany(Module::class);
    }
    public function getPathAttribute(){
        return $this->category->path.'/['.$this->business->name.'] '.$this->attributes['name'];
    }
}
