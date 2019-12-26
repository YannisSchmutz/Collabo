<?php


namespace App\Http\ViewModel;


class CommunityViewModel
{
    private $projects = array();
    private $projectListItemViewModels = array();
    private $profiles = array();

    /**
     * @return array
     */
    public function getProjectListItemViewModels(): array
    {
        return $this->projectListItemViewModels;
    }

    /**
     * @param array $projectListItemViewModels
     */
    public function setProjectListItemViewModels(array $projectListItemViewModels): void
    {
        $this->projectListItemViewModels = $projectListItemViewModels;
    }

    /**
     * @return mixed
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @param mixed $profiles
     */
    public function setProfiles($profiles): void
    {
        $this->profiles = $profiles;
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param mixed $projects
     */
    public function setProjects($projects): void
    {
        $this->projects = $projects;
    }
}
