<?php namespace Motutor\Repo\Tag;

interface TagInterface {

    /**
     * Find existing tags or create if they don't exist
     *
     * @param  Array $tags  Array of strings, each representing a tag
     * @return array         Array or Arrayable collection of Tag objects
     */
    public function findOrCreateTag(array $tags, $slug);

}
