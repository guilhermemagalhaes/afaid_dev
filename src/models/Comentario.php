<?php 


Class Comentario{
   
	private $id;
	private $avaliacao_id;
	private $usuario_id;
	private $comentario;
    private $veracidade;
    

    public function __construct() {

        $avaliacao_id = new Avaliacao();
        $usuario_id = new Usuario();
        
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

    /**
     * Gets the value of usuario_id.
     *
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Sets the value of usuario_id.
     *
     * @param mixed $usuario_id the usuario id
     *
     * @return self
     */
    public function _setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Gets the value of comentario.
     *
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Sets the value of comentario.
     *
     * @param mixed $comentario the comentario
     *
     * @return self
     */
    public function _setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }



    /**
     * Gets the value of veracidade.
     *
     * @return mixed
     */
    public function getVeracidade()
    {
        return $this->veracidade;
    }

    /**
     * Sets the value of veracidade.
     *
     * @param mixed $veracidade the veracidade
     *
     * @return self
     */
    public function _setVeracidade($veracidade)
    {
        $this->veracidade = $veracidade;

        return $this;
    }
}

?>
