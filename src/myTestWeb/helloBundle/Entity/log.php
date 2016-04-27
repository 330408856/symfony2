<?php
	
	namespace myTestWeb\helloBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	/**
	 * @ORM\Entity(repositoryClass="LogRepository")
	 * @ORM\Table(name="log")
	 */
	class log{
		/**
		 * @ORM\Id
		 * @ORM\Column(type="integer")
		 * @ORM\GeneratedValue(strategy="AUTO")
		 * */
		protected $id;
		/**
		 *@ORM\Column(type="integer") 
		 */
		protected $user_id;
		
		
	
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return log
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
