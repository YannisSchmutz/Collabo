<?php


namespace App\Http\ViewModel;


class ProfileViewmodel
{
    private $name;
    private $caption;
    private $picPath;
    private $pitch;
    private $userInterests;
    private $possibleInterestsToAdd;
    private $projects;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param mixed $caption
     */
    public function setCaption($caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return mixed
     */
    public function getPicPath()
    {
        return $this->picPath;
    }

    /**
     * @param mixed $picPath
     */
    public function setPicPath($picPath): void
    {
        $this->picPath = $picPath;
    }

    /**
     * @return mixed
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * @param mixed $pitch
     */
    public function setPitch($pitch): void
    {
        $this->pitch = $pitch;
    }

    /**
     * @return mixed
     */
    public function getUserInterests()
    {
        return $this->userInterests;
    }

    /**
     * @return mixed
     */
    public function getPossibleInterestsToAdd()
    {
        return $this->possibleInterestsToAdd;
    }

    /**
     * @param mixed $interests
     */
    public function setUserInterests($interests): void
    {
        $this->userInterests = $interests;
    }

    /**
     * @param mixed $interests
     */
    public function setPossibleInterestsToAdd($interests): void
    {
        $this->possibleInterestsToAdd = $interests;
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
