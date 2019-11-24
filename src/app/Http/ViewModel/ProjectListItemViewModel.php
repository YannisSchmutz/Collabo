<?php


namespace App\Http\ViewModel;


class ProjectListItemViewModel
{
    private $project;
    private $isRemovable;
    private $redirect;

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

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param mixed $redirect
     */
    public function setRedirect($redirect): void
    {
        $this->redirect = $redirect;
    }

}
