<?PHP
function caesarCipher($text, $key)
{
    $alphabet_en = 'abcdefghijklmnopqrstuvwxyz';
    $alphabet_rus = 'àáâãäå¸æçèéêëìíîïðñòóôõö÷øùúûüýþÿ';
    $result = '';

    for ($i = 0; $i < strlen($text); $i++) {
        $char = mb_substr($text, $i, 1);

        $isUpper = mb_strtoupper($char) === $char;
        $char = mb_strtolower($char);

        $position = mb_strpos($alphabet_en, $char);
        if ($position !== false) {
            $newPosition = ($position + $key) % mb_strlen($alphabet_en);
            $newChar = mb_substr($alphabet_en, $newPosition, 1);

            if ($isUpper) {
                $newChar = mb_strtoupper($newChar);
            }

            $result .= $newChar;
        } else {
            $result .= $char;
        }
    }

    return $result;
}

$text = readline();
$key = 2;
$encryptedText = caesarCipher($text, $key);
echo $encryptedText;

/*

    public function testSimpleEncryption()
    {
        $this->assertEquals('cdefg', caesarCipher('abcde', 2));
        $this->assertEquals('xyz', caesarCipher('vwx', 2));
    }

    public function testUpperCaseEncryption()
    {
        $this->assertEquals('CDEFG', caesarCipher('ABCDE', 2));
        $this->assertEquals('XYA', caesarCipher('VWX', 2));
    }

    public function testMixedCaseEncryption()
    {
        $this->assertEquals('CgEfG', caesarCipher('AbCdE', 2));
    }

    public function testNonAlphabeticCharacters()
    {
        $this->assertEquals('123 !@#', caesarCipher('123 !@#', 2));
        $this->assertEquals('Hello, World!', caesarCipher('Hello, World!', 2));
    }

    public function testSpaces()
    {
        $this->assertEquals('C defg', caesarCipher('A bcd', 2));
    }

    public function testKeyVariations()
    {
        $this->assertEquals('defgh', caesarCipher('abcde', 3));
        $this->assertEquals('abcde', caesarCipher('abcde', 0));
        $this->assertEquals('cdefg', caesarCipher('abcdef', -1));
    }

    public function testEmptyString()
    {
        $this->assertEquals('', caesarCipher('', 2));
    }
}
*/

