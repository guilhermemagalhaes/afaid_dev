<?php 

 Class Contato{

 	private $id;
 	private $nome;
 	private $email;
 	private $mensagem;
 	private $data_cadastro;


 
    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    private function _setId($id){
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    private function _setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    private function _setEmail($email){
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of mensagem.
     *
     * @return mixed
     */
    public function getMensagem(){
        return $this->mensagem;
    }

    /**
     * Sets the value of mensagem.
     *
     * @param mixed $mensagem the mensagem
     *
     * @return self
     */
    private function _setMensagem($mensagem){
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Gets the value of data_cadastro.
     *
     * @return mixed
     */
    public function getDataCadastro(){
        return $this->data_cadastro;
    }

    /**
     * Sets the value of data_cadastro.
     *
     * @param mixed $data_cadastro the data cadastro
     *
     * @return self
     */
    private function _setDataCadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;

        return $this;
    }


}

 ?>