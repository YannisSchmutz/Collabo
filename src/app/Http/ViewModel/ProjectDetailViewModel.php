<?php


namespace App\Http\ViewModel;


class ProjectDetailViewModel
{
    private $id;
    private $name;
    private $caption;
    private $picPath;
    private $pitch;
    private $description;
    private $projectInterests;
    private $possibleInterestsToAdd;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

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
     * @param mixed $name
     */
    public function setCaption($caption): void
    {
        $this->caption = $caption;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function getProjectInterests()
    {
        return $this->projectInterests;
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
    public function setProjectInterests($interests): void
    {
        $this->projectInterests = $interests;
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
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $projects
     */
    public function setMembers($members): void
    {
        $this->members = $members;
    }
}
