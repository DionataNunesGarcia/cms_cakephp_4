<?php

namespace App\Utils;

class Masks
{
    /**
     * @param string|null $cpf
     * @return string|null
     */
    public static function cpf(?string $cpf) :?string
    {
        if (empty($cpf)) {
            return null;
        }
        return self::mask($cpf, '###.###.###-##');
    }

    /**
     * @param string|null $cnpj
     * @return string|null
     */
    public static function cnpj(?string $cnpj) :?string
    {
        if (empty($cnpj)) {
            return null;
        }
        return self::mask($cnpj, '##.###.###/####-##');
    }

    /***
     * @param string|null $value
     * @return string|null
     */
    public static function cpfCnpj(?string $value)
    {
        if (empty($value)) {
            return null;
        }
        if (strlen($value) > 11) {
            return self::cnpj($value);
        }
        return self::cpf($value);
    }

    /**
     * @param string $cep
     * @return string|null
     */
    public static function cep(?string $cep) :?string
    {
        if (empty($cep)) {
            return null;
        }
        return self::mask($cep, '#####-###');
    }

    /**
     * @param string|null $phone
     * @return null
     */
    public static function phone(?string $phone)
    {
        if (empty($phone)) {
            return null;
        }
        if (strlen($phone) === 11) {
            return self::mask($phone, '(##) #####-####');
        }
        return self::mask($phone, '(##) ####-####');
    }

    /**
     * @param string $val
     * @param string $mask
     * @return string
     */
    public static function mask(string $val, string $mask) :string
    {
        $response = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $response .= $val[$k++];
                }
            } else if (isset($mask[$i])) {
                $response .= $mask[$i];
            }
        }
        return $response;
    }

    /**
     * @param string|null $cpf
     * @return bool
     */
    public static function cpfIsValid(?string $cpf)
    {
        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
        }
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf . $c * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf . $c != $d) {
                return false;
            }
        }
        return true;
    }
}
