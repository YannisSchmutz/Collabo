<?php


namespace App\Http\ViewModel;


class ProjectListItemViewModel
{
    private $project;
    private $isRemovable;

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project): void
    {
        $this->project = $project;
    }

    /**
     * @return mixed
     */
    public function getIsRemovable()
    {
        return $this->isRemovable;
    }

    /**
     * @param mixed $isRemovable
     */
    public function setIsRemovable($isRemovable): void
    {
        $this->isRemovable = $isRemovable;
    }

}
