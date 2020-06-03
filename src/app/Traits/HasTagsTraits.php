<?php

namespace VCComponent\Laravel\Tag\Traits;

use VCComponent\Laravel\Tag\Entities\Tag;

trait HasTagsTraits
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    protected function ofTag($id)
    {
        return Tag::with('posts')->where('id', $id);
    }
    protected function oftags($ids)
    {
        return Tag::with('posts')->whereIn('id', [$ids]);
    }

    public function attachTag($tag_id)
    {
        $this->tags()->attach($tag_id);
    }
    public function attachTags($tag_ids)
    {
        $this->tags()->attach($tag_ids);
    }

    public function detachTags($tag_ids)
    {
        $this->tags()->detach($tag_ids);
    }

    public function syncTag($tag_id)
    {
        $this->tags()->sync($tag_id);
    }
}
