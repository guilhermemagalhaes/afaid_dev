<?php

// require_once './src/models/Usuario.php';


Class Notificacao{
	private $id;
	private $de_id;
	private $para_id;
	private $status;
    private $tipo;
    private $avaliacao_id;

	public function __construct() {

        $de_id = new Usuario();
        $para_id = new Usuario();  
 
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
     * Gets the value of de_id.
     *
     * @return mixed
     */
    public function getDeId()
    {
        return $this->de_id;
    }

    /**
     * Sets the value of de_id.
     *
     * @param mixed $de_id the de id
     *
     * @return self
     */
    public function _setDeId($de_id)
    {
        $this->de_id = $de_id;

        return $this;
    }

    /**
     * Gets the value of para_id.
     *
     * @return mixed
     */
    public function getParaId()
    {
        return $this->para_id;
    }

    /**
     * Sets the value of para_id.
     *
     * @param mixed $para_id the para id
     *
     * @return self
     */
    public function _setParaId($para_id)
    {
        $this->para_id = $para_id;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function _setStatus($status)
    {
        $this->status = $status;

        return $this;
    }



    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the value of tipo.
     *
     * @param mixed $tipo the tipo
     *
     * @return self
     */
    public function _setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Gets the value of avaliacao_id.
     *
     * @return mixed
     */
    public function getAvaliacaoId()
    {
        return $this->avaliacao_id;
    }

    /**
     * Sets the value of avaliacao_id.
     *
     * @param mixed $avaliacao_id the avaliacao id
     *
     * @return self
     */
    public function _setAvaliacaoId($avaliacao_id)
    {
        $this->avaliacao_id = $avaliacao_id;

        return $this;
    }
}

 ?>