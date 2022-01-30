<?php
namespace App\Classes;
class RfidClass{

 
    public $tab6bit= array(
        array(" ","100000"),array("!","100001"),array("*","101010"),array("+","101011"),array("-","101101"),
        array("0","110000"),array("1","110001"),array("2","110010"),array("3","110011"),array("4","110100"),
        array("5","110101"),array("6","110110"),array("7","110111"),array("8","111000"),array("9","111001"),
        array("A","000001"),array("B","000010"),array("C","000011"),array("D","000100"),array("E","000101"),
        array("F","000110"),array("G","000111"),array("H","001000"),array("I","001001"),array("J","001010"),
        array("K","001011"),array("L","001100"),array("M","001101"),array("N","001110"),array("O","001111"),
        array("P","010000"),array("Q","010001"),array("R","010010"),array("S","010011"),array("T","010100"),
        array("U","010101"),array("V","010110"),array("W","010111"),array("X","011000"),array("Y","011001"),
        array("Z","011010")
    );
    public function __construct(){
        return "rfid";
    }
    public  function setValuePN($value){
        $this->pn=$value;
    }
    public function getValuePN(){
        return $this->pn;
    }
    public  function setValue_rfidhex($value){
        $this->rfidhex=$value;
    }
    public function getValue_rfidhex(){
        return $this->rfidhex;
    }
    public function getValuetab6bit(){
        return $this->tab6bit;
    }


    public function change_bin_to_hex($str) 
    {
        $return = '';
        for($i = 0; $i <strlen($str); $i=$i+4) {
            $return .= dechex(bindec(substr($str, $i, 4)));
        }
        return $return;
    }
    public function change_asci_to_hex_vw($str,$table=NULL) {
        $ciag='';
        $row_count=strlen($str);
        for ($i=0; $i < $row_count; $i++) { 
            $match=substr($str, $i, 1);
            for ($k=0; $k <count($table) ; $k++) { 
                if($match==$table[$k][0]){
                $ciag.=$table[$k][1];
                }   
             }
        }
        while (strlen($ciag) <240) {
            $ciag.="100001";
        }
        $cutted_ciag=substr($ciag,0,240);
        $ciag=strtoupper($this->change_bin_to_hex($cutted_ciag)); 
        return $ciag;
    }
    
    
    public function check_digit_modulo_43(string $n){
        $chars = array(
            0 => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => 'A',
            11 => 'B',
            12 => 'C',
            13 => 'D',
            14 => 'E',
            15 => 'F',
            16 => 'G',
            17 => 'H',
            18 => 'I',
            19 => 'J',
            20 => 'K',
            21 => 'L',
            22 => 'M',
            23 => 'N',
            24 => 'O',
            25 => 'P',
            26 => 'Q',
            27 => 'R',
            28 => 'S',
            29 => 'T',
            30 => 'U',
            31 => 'V',
            32 => 'W',
            33 => 'X',
            34 => 'Y',
            35 => 'Z',
            36 => '-',
            37 => '.',
            38 => ' ',
            39 => '$',
            40 => '/',
            41 => '+',
            42 => '%'
            );
        $nstr = $n . "";
        $sum = 0;
        for ($i = 0; $i < strlen($nstr); ++$i)
        {
        $k = substr($n, $i, 1);
        $m = array_search($k, $chars);
        $sum += $m;
        }
        
        $ns=($sum % 43);
        
        return $n.$chars[$ns];
    }
    
}

