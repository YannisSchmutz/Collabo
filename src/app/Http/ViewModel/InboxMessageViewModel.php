<?php


namespace App\Http\ViewModel;


class InboxMessageViewModel
{
   private $projectname;
   private $username;
   private $messagetype;

   private $forwardId;
   private $likeId;

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
    public function getForwardId()
    {
        return $this->forwardId;
    }

    /**
     * @param mixed $forwardId
     */
    public function setForwardId($forwardId): void
    {
        $this->forwardId = $forwardId;
    }

    /**
     * @return mixed
     */
    public function getLikeId()
    {
        return $this->likeId;
    }

    /**
     * @param mixed $likeId
     */
    public function setLikeId($likeId): void
    {
        $this->likeId = $likeId;
    }


}
