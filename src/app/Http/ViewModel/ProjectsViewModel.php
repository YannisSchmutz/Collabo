<?php


namespace App\Http\ViewModel;


class ProjectsViewModel
{
    private $ownedProjects;
    private $relatedProjects;

    /**
     * @return mixed
     */
    public function getOwnedProjects()
    {
        return $this->ownedProjects;
    }

    /**
     * @param mixed $ownedProjects
     */
    public function setOwnedProjects($ownedProjects): void
    {
        $this->ownedProjects = $ownedProjects;
    }

    /**
     * @return mixed
     */
    public function getRelatedProjects()
    {
        return $this->relatedProjects;
    }

    /**
     * @param mixed $relatedProjects
     */
    public function setRelatedProjects($relatedProjects): void
    {
        $this->relatedProjects = $relatedProjects;
    }
}
