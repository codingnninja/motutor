<?php namespace Motutor\Repo\School;

use Motutor\Service\Cache\CacheInterface;
use Motutor\Repo\School\SchoolInterface;
use Motutor\Repo\School\AbstractSchoolDecorator;

class SchoolCacheDecorator extends AbstractSchoolDecorator {

    protected $cache;

    public function __construct(SchoolInterface $nextSchool, CacheInterface $cache)
    {
        parent::__construct($nextSchool);
        $this->cache = $cache;
    }

    /**
     * Attempt to retrieve from cache
     * by ID
     * {@inheritdoc}
     */
    public function byId($id)
    {
        $key = md5('id.'.$id);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $school = $this->nextSchool->byId($id);

        $this->cache->put($key, $school);

        return $school;
    }

    /**
     * Attempt to retrieve from cache
     * {@inheritdoc}
     */
    public function byPage($page=1, $limit=10, $all=false)
    {
        $allkey = ($all) ? '.all' : '';
        $key = md5('page.'.$page.'.'.$limit.$allkey);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $paginated = $this->nextSchool->byPage($page, $limit);

        $this->cache->put($key, $paginated);

        return $paginated;
    }

    /**
     * Attempt to retrieve from cache
     * {@inheritdoc}
     */
    public function bySlug($slug)
    {
        $key = md5('slug.'.$slug);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $school = $this->nextSchool->bySlug($slug);
        $school->media = $this->nextSchool
                               ->convertStringToArray(',', $school->media);

        $this->cache->put($key, $school);

        return $school;
    }

    /**
     * Attempt to retrieve from cache
     * {@inheritdoc}
     */
    public function byTag($tag, $page=1, $limit=10)
    {
        $key = md5('tag.'.$tag.'.'.$page.'.'.$limit);

        if( $this->cache->has($key) )
        {
            return $this->cache->get($key);
        }

        $paginated = $this->nextSchool->byTag($tag, $page, $limit);

        $this->cache->put($key, $paginated);

        return $paginated;
    }


    public function convertStringToArray($delimiter, $string) 
    {
        return $this->nextSchool
                    ->convertStringToArray($delimiter, $string);
    }

}
