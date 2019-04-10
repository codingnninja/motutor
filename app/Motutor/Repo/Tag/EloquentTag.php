<?php namespace Motutor\Repo\Tag;

use Motutor\Repo\RepoAbstract;
use Motutor\Repo\Tag\TagInterface;
use Motutor\Service\Cache\CacheInterface;
use App\Models\Tag;

class EloquentTag extends RepoAbstract implements TagInterface {

    protected $tag;
    protected $cache;

    // Class expects an Eloquent model
    public function __construct(Tag $tag, CacheInterface $cache)
    {
        $this->tag = $tag;
        $this->cache = $cache;
    }

    public function findOrCreateTag(array $data, $slug){
        //Call an inherited method (findOrCreate) from RepoAbstract
       return $this->findOrCreate($data, $slug, 'tag');
    }
    
}