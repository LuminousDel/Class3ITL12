<html>
    <head></head>
    <body>
        <form method="post">
            Primzahlen berechnen bis: <input type="number" name="numbMax"></BR>
            <input type="submit">Calculate</BR>
        </form>
        </BR></BR>
        <?php
            $maxPrim = $_REQUEST['numbMax'];
            if(empty($maxPrim)){  $maxPrim = 0;  }
            for ($runningVar = 1; $runningVar <= $maxPrim; $runningVar++) {
                $divided = false;
                for ($checkIfDivisible = 2; $runningVar > $checkIfDivisible; $checkIfDivisible++){
                    if ($runningVar%$checkIfDivisible == 0){
                        $divided = true;
                    }
                }
                if(!$divided){
                    echo ("</BR>$runningVar");
                }
            }
        ?>
    </body>
</html>