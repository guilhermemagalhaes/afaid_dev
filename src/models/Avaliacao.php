<?php 

require_once 'Usuario.php';
require_once 'TipoAvaliacao.php';

Class Avaliacao{

	private $id;
	// private $empresa;
	private $local;
	// private $url;
	private $categoria;
	private $foto;
	private $descricao;
	private $data;
	private $nota;
	private $tipo_avaliacao;
	private $user;
    private $site_id;
    private $local_id;
		

      public function __construct() {

        // $empresa = new Empresa();
        $user = new Usuario();
        $tipo_avaliacao = new TipoAvaliacao();
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
     * Gets the value of empresa.
     *
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Sets the value of empresa.
     *
     * @param mixed $empresa the empresa
     *
     * @return self
     */
    public function _setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Gets the value of local.
     *
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Sets the value of local.
     *
     * @param mixed $local the local
     *
     * @return self
     */
    public function _setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
   

    /**
     * Gets the value of categoria.
     *
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Sets the value of categoria.
     *
     * @param mixed $categoria the categoria
     *
     * @return self
     */
    public function _setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Gets the value of foto.
     *
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Sets the value of foto.
     *
     * @param mixed $foto the foto
     *
     * @return self
     */
    public function _setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Gets the value of descricao.
     *
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Sets the value of descricao.
     *
     * @param mixed $descricao the descricao
     *
     * @return self
     */
    public function _setDescricao($descricao)
    {
        $this->descricao = $descricao;

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
    public function _setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Gets the value of nota.
     *
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Sets the value of nota.
     *
     * @param mixed $nota the nota
     *
     * @return self
     */
    public function _setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Gets the value of tipo_avaliacao.
     *
     * @return mixed
     */
    public function getTipoAvaliacao()
    {
        return $this->tipo_avaliacao;
    }

    /**
     * Sets the value of tipo_avaliacao.
     *
     * @param mixed $tipo_avaliacao the tipo avaliacao
     *
     * @return self
     */
    public function _setTipoAvaliacao($tipo_avaliacao)
    {
        $this->tipo_avaliacao = $tipo_avaliacao;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function _setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the value of url.
     *
     * @param mixed $url the url
     *
     * @return self
     */
    private function _setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of site_id.
     *
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Sets the value of site_id.
     *
     * @param mixed $site_id the site id
     *
     * @return self
     */
    public function _setSiteId($site_id)
    {
        $this->site_id = $site_id;

        return $this;
    }

    /**
     * Gets the value of local_id.
     *
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->local_id;
    }

    /**
     * Sets the value of local_id.
     *
     * @param mixed $local_id the local id
     *
     * @return self
     */
    public function _setLocalId($local_id)
    {
        $this->local_id = $local_id;

        return $this;
    }
}
	

?>
