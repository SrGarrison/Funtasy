<?php

class Helpers
{
    function slug(string $string): string
    {
        $mapa['a'] = '';

        return $string;
    }


    /**
     * Função utilizada para verificar informações basicas de dias, mes e hora
     * @param string $diaMes para ver o dia do mes
     * @param string $diaSemana para ver o dia da semana
     * @param string $mes para ver o mes
     * @param string $ano para ver o ano
     * @return string para ver as informações basicas
     */
    public static function data_atual(): string
    {
        $diaMes = date("d");
        $diaSemana = date("w");
        $mes = date("n") - 1;
        $ano = date("Y");

        $nome_dia_semana = [
            'domingo',
            'segunda',
            'terça',
            'quarta',
            'quinta',
            'sexta',
            'sabado'
        ];

        $nome_dos_meses = [
            'janeiro',
            'fevereiro',
            'março',
            'abril',
            'maio',
            'junho',
            'julho',
            'agosto',
            'setembro',
            'outubro',
            'novembro',
            'dezembro'
        ];

        $data_formatada = $nome_dia_semana[$diaSemana] . ', ' . $diaMes . ', ano ' . $ano;

        return $data_formatada;
    }



    /**
     * Monta url de acordo com o ambiente
     * @param string $url para da url ex. admin
     * @return string url completa
     */
    function url(string $url): string
    {
        $servidor = filter_input(INPUT_SERVER, "SERVER_NAME");
        $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);

        return $ambiente . $url;
    }

    /**
     * Função para validar url de acesso
     * @param string $url variavel url
     */
    function validar_URL(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * Função para validar email
     * @param string $email variavel email
     */
    function validar_email(string  $email): bool
    {
        //os filtros assim como funções pré definidas nos ajudam a acelerar o processo de codar
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    /**
     * Função para contar tempo
     * @param string $agora variavel que recebe data e hora
     * @param string $tempo amarzena o input da main
     * @param int $diferenca faz a subtração de agora por tempo, deste modo da para saber a diferença de segundos
     * @param int $segundos varial que amarzena o valor da $diferença
     * @param float $minutos arrendondamento de minutos
     * @param float $horas arrendondamento de horas
     * @param float $dias arrendondamento de dias
     * @param float $semanas arrendondamento de semanas
     * @param float $meses arrendondamento de meses
     * @param float $anos arrendondamento de anos
     */
    function contarTempo(string $data)
    {
        //strtotime = função para converter a data em segundos
        $agora = strtotime(date("Y-m-d H:i:s"));
        $tempo = strtotime($data);
        $diferença = $agora - $tempo;

        $segundos = $diferença;
        $minutos = round($diferença / 60);
        $horas = round($diferença / 3600);
        $dias = round($diferença / 86400);
        $semanas = round($diferença / 604800);
        $meses = round($diferença / 2419200);
        $anos = round($diferença / 29030400);

        if ($segundos <= 60) {
            return "Agora.";
        } elseif ($minutos <= 60) {
            return $minutos == 1 ? 'Há 1 minuto' : "Há " . $minutos . ' minutos';
        } elseif ($horas <= 24) {
            return $horas == 1 ? 'Há 1 hora' : "Há " . $horas . ' horas';
        } elseif ($dias <= 7) {
            return $dias == 1 ? 'Ontem' : "Há " . $dias . ' didas';
        } elseif ($semanas <= 4) {
            return $semanas == 1 ? 'Há 1 semana' : "Há " . $semanas . ' semanas';
        } elseif ($meses <= 12) {
            return $meses == 1 ? 'Há 1 mes' : "Há " . $meses . ' meses';
        } elseif ($anos <= 1) {
            return $anos == 1 ? 'Há 1 ano' : "Há " . $anos . ' anos';
        }
    }



    /**
     * Função para colocar decimais nos valores
     * @param float $valor variavel que receberá o valor
     * @return string
     */
    function formatar_valor(float $valor = null): string
    {
        return number_format(($valor ? $valor : 0), 2, ',', '.');
    }


    public static function saudacao(): string
    {
        //a função date que foi utilizado agora já está implementado no php, deste modo facilita a vida dos usuarios, é como se fosse uma biblioteca, deste modo não é necessario fazer a entrada manual

        $hora = date('H:i:s');

        //if ($hora >= 5 and $hora <= 12) {
        //    return "Bom Dia!";
        // }else if ($hora >= 12 and $hora <= 17) {
        //     return "Boa Tarde!";
        //}else if ($hora >= 17 and $hora <= 23) {
        //   return "Boa Tarde!";
        // }else{
        //    return "Vai dormi caraio!";
        //}

        switch ($hora) {
            case $hora >= 5 and $hora <= 12:
                $saudacao = 'Bom Dia!';
                break;
            case $hora >= 12 and $hora <= 17:
                $saudacao = 'Boa Tarde!';
                break;
            case $hora >= 17 and $hora <= 23:
                $saudacao = 'Boa Noite!';
                break;
            default:
                $saudacao = 'Boa madrugada!';
        }
        return $saudacao;
    }

    /**
     * Resume um texto de forma limitada 
     * @param string $texto texto para ser resumido
     * @param int $limite quantidade de caracteres
     * @param string $continue opcional - o que deve ser exibido ao final do resumo, caso chegue ao limite de caracteres
     * @return string texto resumido
     */
    function resumir_texto(string $texto, int $limite, string $continue = '...')
    {
        //trim = função para não armazenar os campos de espaço do texto
        //strip_tags = função para limpar todas as tags de HTML
        $texto_limpo = trim(strip_tags($texto));
        //mb_strlen = função para ler a quantidade de caracteres do texto
        if (mb_strlen($texto_limpo) <= $limite) {
            return $texto_limpo;
        }
        //mb_substr = função para limitar o texto, conforma os parametros que são passado ao sitema
        //mb_strripos = função de analise e verificar qual foi a ultima ocorrencia de tal caractere e qual sua posição no texto
        $resumir_texto = mb_substr($texto_limpo, 0, mb_strripos(mb_substr($texto_limpo, 0, $limite), ''));

        return $resumir_texto . $continue;
    }
}
