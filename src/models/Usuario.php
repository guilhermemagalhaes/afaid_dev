<?php 


Class Usuario {
	private $id;
	private $nome;
	private $sobrenome; 
	private $email;
	private $data_cadastro;
	private $data_nascimento;
	private $imagem;
	private $deficiencia;
	private $sexo;
	private $status;
	private $senha;
	private $perfil;
	private $capa;
	private $privacidade;
    
	
    public function __construct() {

        $perfil_id = new Perfil(); 
          
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
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function _setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of sobrenome.
     *
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Sets the value of sobrenome.
     *
     * @param mixed $sobrenome the sobrenome
     *
     * @return self
     */
    public function _setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of data_cadastro.
     *
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * Sets the value of data_cadastro.
     *
     * @param mixed $data_cadastro the data cadastro
     *
     * @return self
     */
    public function _setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }

    /**
     * Gets the value of data_nascimento.
     *
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * Sets the value of data_nascimento.
     *
     * @param mixed $data_nascimento the data nascimento
     *
     * @return self
     */
    public function _setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    /**
     * Gets the value of imagem.
     *
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Sets the value of imagem.
     *
     * @param mixed $imagem the imagem
     *
     * @return self
     */
    public function _setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Gets the value of deficiencia.
     *
     * @return mixed
     */
    public function getDeficiencia()
    {
        return $this->deficiencia;
    }

    /**
     * Sets the value of deficiencia.
     *
     * @param mixed $deficiencia the deficiencia
     *
     * @return self
     */
    public function _setDeficiencia($deficiencia)
    {
        $this->deficiencia = $deficiencia;

        return $this;
    }

    /**
     * Gets the value of sexo.
     *
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Sets the value of sexo.
     *
     * @param mixed $sexo the sexo
     *
     * @return self
     */
    public function _setSexo($sexo)
    {
        $this->sexo = $sexo;

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
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function _setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Gets the value of perfil_id.
     *
     * @return mixed
     */
    public function getPerfilId()
    {
        return $this->perfil_id;
    }

    /**
     * Sets the value of perfil_id.
     *
     * @param mixed $perfil_id the perfil id
     *
     * @return self
     */
    public function _setPerfilId($perfil_id)
    {
        $this->perfil_id = $perfil_id;

        return $this;
    }

    /**
     * Gets the value of capa.
     *
     * @return mixed
     */
    public function getCapa()
    {
        return $this->capa;
    }

    /**
     * Sets the value of capa.
     *
     * @param mixed $capa the capa
     *
     * @return self
     */
    public function _setCapa($capa)
    {
        $this->capa = $capa;

        return $this;
    }

    /**
     * Gets the value of privacidade.
     *
     * @return mixed
     */
    public function getPrivacidade()
    {
        return $this->privacidade;
    }

    /**
     * Sets the value of privacidade.
     *
     * @param mixed $privacidade the privacidade
     *
     * @return self
     */
    public function _setPrivacidade($privacidade)
    {
        $this->privacidade = $privacidade;

        return $this;
    }

}

 ?>