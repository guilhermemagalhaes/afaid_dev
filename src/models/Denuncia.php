<?php 

require_once './src/models/Usuario.php';
require_once './src/models/Avaliacao.php';


Class Denuncia{
	private $id;
	private $denunciado_id;
	private $denunciante_id;
	private $data;
	private $avaliacao_id;


    public function __construct() {

        $denunciado_id = new Usuario();
        $denunciante_id = new Usuario();
        $avaliacao_id = new Avaliacao();
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
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of denunciado_id.
     *
     * @return mixed
     */
    public function getDenunciadoId()
    {
        return $this->denunciado_id;
    }

    /**
     * Sets the value of denunciado_id.
     *
     * @param mixed $denunciado_id the denunciado id
     *
     * @return self
     */
    private function _setDenunciadoId($denunciado_id)
    {
        $this->denunciado_id = $denunciado_id;

        return $this;
    }

    /**
     * Gets the value of denunciante_id.
     *
     * @return mixed
     */
    public function getDenuncianteId()
    {
        return $this->denunciante_id;
    }

    /**
     * Sets the value of denunciante_id.
     *
     * @param mixed $denunciante_id the denunciante id
     *
     * @return self
     */
    private function _setDenuncianteId($denunciante_id)
    {
        $this->denunciante_id = $denunciante_id;

        return $this;
    }

    /**
     * Gets the value of data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the value of data.
     *
     * @param mixed $data the data
     *
     * @return self
     */
    private function _setData($data)
    {
        $this->data = $data;

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
    private function _setAvaliacaoId($avaliacao_id)
    {
        $this->avaliacao_id = $avaliacao_id;

        return $this;
    }


}

 ?>