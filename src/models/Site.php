<?php 
Class Site{
    private $idsite;
    private $idlocal;
	private $Nome;
    private $usuario_id;
    private $url;
    private $Endereco;
    private $Motivacao;
    private $denunciado;
    private $conteudo;
    /**
     * Gets the value of Nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * Sets the value of Nome.
     *
     * @param mixed $Nome the nome
     *
     * @return self
     */
    public function _setNome($Nome)
    {
        $this->Nome = $Nome;

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
    public function _setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of Endereco.
     *
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->Endereco;
    }

    /**
     * Sets the value of Endereco.
     *
     * @param mixed $Endereco the endereco
     *
     * @return self
     */
    public function _setEndereco($Endereco)
    {
        $this->Endereco = $Endereco;

        return $this;
    }

    /**
     * Gets the value of idsite.
     *
     * @return mixed
     */
    public function getIdsite()
    {
        return $this->idsite;
    }

    /**
     * Sets the value of idsite.
     *
     * @param mixed $idsite the idsite
     *
     * @return self
     */
    public function _setIdsite($idsite)
    {
        $this->idsite = $idsite;

        return $this;
    }

    /**
     * Gets the value of idlocal.
     *
     * @return mixed
     */
    public function getIdlocal()
    {
        return $this->idlocal;
    }

    /**
     * Sets the value of idlocal.
     *
     * @param mixed $idlocal the idlocal
     *
     * @return self
     */
    public function _setIdlocal($idlocal)
    {
        $this->idlocal = $idlocal;

        return $this;
    }

    /**
     * Gets the value of Motivacao.
     *
     * @return mixed
     */
    public function getMotivacao()
    {
        return $this->Motivacao;
    }

    /**
     * Sets the value of Motivacao.
     *
     * @param mixed $Motivacao the motivacao
     *
     * @return self
     */
    public function _setMotivacao($Motivacao)
    {
        $this->Motivacao = $Motivacao;

        return $this;
    }

    /**
     * Gets the value of denunciado.
     *
     * @return mixed
     */
    public function getDenunciado()
    {
        return $this->denunciado;
    }

    /**
     * Sets the value of denunciado.
     *
     * @param mixed $denunciado the denunciado
     *
     * @return self
     */
    public function _setDenunciado($denunciado)
    {
        $this->denunciado = $denunciado;

        return $this;
    }

    /**
     * Gets the value of conteudo.
     *
     * @return mixed
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Sets the value of conteudo.
     *
     * @param mixed $conteudo the conteudo
     *
     * @return self
     */
    public function _setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }
}
