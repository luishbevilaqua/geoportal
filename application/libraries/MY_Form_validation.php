<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function unique($value, $params) {
        $CI = & get_instance();

        $CI->form_validation->set_message('unique',
                '%s já esta cadastrado');

        list($model, $field) = explode(".", $params, 2);

        $find = "findOneBy" . $field;

        if (Doctrine::getTable($model)->$find($value)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Verifica se o CNPJ é valido
     * @param     string
     * @return     bool
     */
    function valid_cnpj($str) {

        $CI = & get_instance();

        $CI->form_validation->set_message('valid_cnpj',
                'O %s informado é inválido.');

        if (strlen($str) <> 18)
            return FALSE;
        $soma1 = ($str[0] * 5) +
                ($str[1] * 4) +
                ($str[3] * 3) +
                ($str[4] * 2) +
                ($str[5] * 9) +
                ($str[7] * 8) +
                ($str[8] * 7) +
                ($str[9] * 6) +
                ($str[11] * 5) +
                ($str[12] * 4) +
                ($str[13] * 3) +
                ($str[14] * 2);
        $resto = $soma1 % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;
        $soma2 = ($str[0] * 6) +
                ($str[1] * 5) +
                ($str[3] * 4) +
                ($str[4] * 3) +
                ($str[5] * 2) +
                ($str[7] * 9) +
                ($str[8] * 8) +
                ($str[9] * 7) +
                ($str[11] * 6) +
                ($str[12] * 5) +
                ($str[13] * 4) +
                ($str[14] * 3) +
                ($str[16] * 2);
        $resto = $soma2 % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        return (($str[16] == $digito1) && ( $str[17] == $digito2));
    }

    /**
     * Verifica se o CPF informado é valido
     * @param     string
     * @return     bool
     */
    function valid_cpf($cpf) {
        $CI = & get_instance();

        $CI->form_validation->set_message('valid_cpf',
                'O %s informado é inválido.');

        // retira possiveis caracters
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $cpf = str_replace('/', '', $cpf);


       // Verifiva se o nÃºmero digitado contÃ©m todos os digitos
        $cpf = str_pad(preg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);

        // Verifica se nenhuma das sequÃªncias abaixo foi digitada, caso

        if (strlen($cpf) != 11 ||
                $cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return FALSE;
        } else {
            // Calcula os nÃºmeros para verificar se o CPF Ã© verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    /**
     * Verifica se a data informada eh valida, formato padrao dd/mm/yyyy
     * caso precise validar em outros formatos adicione nessa funcao
     * ex: mm/yyyy, mm/yy, etc
     * @param     string
     * @return     bool
     */
    function valid_date($date, $format = 'dd/mm/yyyy') {

        $CI = & get_instance();

        $CI->form_validation->set_message('valid_date',
                'A %s informada é inválida.');

        $date = str_replace("-", "/", $date);
        $dateArray = explode("/", $date); // slice the date to get the

        $d = 0;
        $m = 0;
        $y = 0;
        if (sizeof($dateArray) == 3) {
            if (is_numeric($dateArray[0]))
                $d = $dateArray[0];
            if (is_numeric($dateArray[1]))
                $m = $dateArray[1];
            if (is_numeric($dateArray[2]))
                $y = $dateArray[2];
        }

        return checkdate($m, $d, $y) == 1;
    }
	
   function decimal($value)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('decimal',
			'O campo %s aceita somente números.');

        $regx = '/^[-+]?[0-9]*\.?[0-9]*$/';
        if(preg_match($regx, $value))
            return true;
        return false;
    }
	

}
