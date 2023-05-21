
<?php
    $plaintext="HELLO";
    $key=8;
    $result="";
    $result1="";
    for($i=0;$i<strlen($plaintext);$i++){
        if (ctype_upper($plaintext[$i])){
            $result = $result.chr((ord($plaintext[$i]) + $key - 65)%26 + 65);
        }
    }
    for($i=0;$i<strlen($plaintext);$i++){
        if (ctype_upper($plaintext[$i])){
            $result1 = $result1.chr((ord($plaintext[$i]) - $key - 65) % 26 + 65);
        }
    }
    echo "This is the plaintext: $plaintext";
    echo "</br>";
    echo "This is the key: $key";
    echo "</br>";
    echo "This is the encrypted:$result";
    echo "</br>";
    echo "This is the decrypted:$result1";
?>
