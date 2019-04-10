<?php  namespace Motutor\Repo\School;

abstract class AbstractSchoolDecorator implements SchoolInterface {

    protected $nextSchool;

    public function __construct(SchoolInterface $nextSchool)
    {
        $this->nextSchool = $nextSchool;
    }

    /**
     * {@inheritdoc}
     */
    public function byId($id)
    {
        return $this->nextSchool->byId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function byPage($page=1, $limit=10, $all=false)
    {
        return $this->nextSchool->byPage($page, $limit, $all);
    }

    /**
     * {@inheritdoc}
     */
    public function bySlug($slug)
    {
        return $this->nextSchool->bySlug($slug);
    }

    /**
     * {@inheritdoc}
     */
    public function byTag($tag, $page=1, $limit=10)
    {
        return $this->nextSchool->byTag($tag, $page, $limit);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        return $this->nextSchool->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update(array $data)
    {
        return $this->nextSchool->update($data);
    }
        /**
     * Common point create and update
     *
     * @param array  Data to update an school
     * @param model  Model to save a new object
     * @return boolean
     */
    public function createOrUpdate(array $data, $model=null)
    {
        $school === true ?
           $this->nextSchool->update($data)
           :$this->nextSchool->create($data);
    }


}
