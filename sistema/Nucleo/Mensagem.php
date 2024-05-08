<?php
/**
 * @author Manoel Victor Lourenço de Oliveira manoelvictor756@gmail.com>
 */
class Mensagem
{
    public $texto;
    public $css;

    public function sucesso (string $mensagem):Mensagem
    {
        $this->texto = $this ->filtrar($mensagem);

        return $this;
    }


    /**
     * Função para mostrar mensagem 
     * @param string receber mensagem
     * @return string
     */
    public function renderizar():string
    {
        return $this->texto;
    }

    /**
     * Função para filtrar mensagem e não aceitar tags
     * @param string $mensagem irá receber o filtro 
     * @return string
     */
    private function filtrar(string $mensagem):string
    {
        return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}