<?php


namespace App\Http\ViewModel;


class InboxMessageViewModel
{
   private $projectname;
   private $username;
   private $picpath;
   private $messagetype;

   private $projectId;
   private $userId;

    /**
     * @return mixed
     */
    public function getPicpath()
    {
        return $this->picpath;
    }

    /**
     * @param mixed $picpath
     */
    public function setPicpath($picpath): void
    {
        $this->picpath = $picpath;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getProjectname()
    {
        return $this->projectname;
    }

    /**
     * @param mixed $projectname
     */
    public function setProjectname($projectname): void
    {
        $this->projectname = $projectname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getMessagetype()
    {
        return $this->messagetype;
    }

    /**
     * @param mixed $messagetype
     */
    public function setMessagetype($messagetype): void
    {
        $this->messagetype = $messagetype;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param mixed $projectId
     */
    public function setProjectId($projectId): void
    {
        $this->projectId = $projectId;
    }
}
