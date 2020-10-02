<?php 



Class Amizade{

	private $id;
	private $user_id;
	private $seguindo_id;


	public function __construct() {

        $user_id = new Usuario(); 
        $seguindo_id = new Usuario();  

    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of user_id.
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Sets the value of user_id.
     *
     * @param mixed $user_id the user id
     *
     * @return self
     */
    public function _setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Gets the value of seguindo_id.
     *
     * @return mixed
     */
    public function getSeguindoId()
    {
        return $this->seguindo_id;
    }

    /**
     * Sets the value of seguindo_id.
     *
     * @param mixed $seguindo_id the seguindo id
     *
     * @return self
     */
    public function _setSeguindoId($seguindo_id)
    {
        $this->seguindo_id = $seguindo_id;

        return $this;
    }
}


 ?>