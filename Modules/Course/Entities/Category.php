<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "category_id", "description"];
    /**
     * Category belongs to Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsTo(Category::class);
    }
    /**
     * Category has many Courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
        return $this->hasMany(Course::class);
    }
    public function getCatDir($category)
    {
        $cats = [$category->name];
        if ($category->category_id > 0) {
            $cats[] = $this->getCatDir($category->category);
        }
        $cats = array_reverse($cats);
        return implode('/', $cats);
    }
    public function getPathAttribute(){
        return $this->getCatDir($this);
    }
    public function getNameFullAttribute()
    {
        $name = [$this->attributes['name']];
        if ($this->attributes['category_id'] > 0) {
            $name[] = $this->category->name_full;
        }
        return implode(' > ', array_reverse($name));
    }

}
