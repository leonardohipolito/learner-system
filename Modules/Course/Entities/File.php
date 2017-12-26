<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ["name","ext","complete","description","module_id"];
    /**
     * File belongs to Module.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
    	// belongsTo(RelatedModel, foreignKey = module_id, keyOnRelatedModel = id)
    	return $this->belongsTo(Module::class);
    }

    public function getFileAttribute()
    {
        $category     = $this->getCatDir($this->module->course->category);
        return asset('courses/' . $category . '/[' . $this->module->course->business->name . '] ' . $this->module->course->name . '/' . $this->module->name.'/'.$this->name);
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
}
