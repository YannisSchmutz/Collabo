<?php


namespace App\Http\ViewModel;


class ProjectDetailViewModel
{
    private $name;
    private $caption;
    private $picPath;
    private $pitch;
    private $description;
    private $interests;

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
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param mixed $interests
     */
    public function setInterests($interests): void
    {
        $this->interests = $interests;
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
