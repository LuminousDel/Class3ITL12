<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap 5 Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        <!--

        Geschlecht
        Alter
        Gewicht
        Größe

        Tägliche Bewegung
        Sitzen (Zeit)
        Stehend/Gehend (Zeit)
        -->
        <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p> 
        </div>
        
        <form>
        <div class="form-group">
            <label>Geschlecht</label>

            <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="1"> <label class="form-check-label">männlich</label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="2"> <label class="form-check-label">weiblich</label>
            </div>
        </div>

        <div class="form-group">
            <label>Alter</label> <input type="number" class="form-control" name="age" placeholder="Placeholder Textfeld">
        </div>

        <div class="form-group">
            <label>Gewicht</label> <input type="number" class="form-control" name="weight" placeholder="Placeholder Textfeld">
        </div>

        <div class="form-group">
            <label>Größe</label> <input type="number" class="form-control" name="height" placeholder="Placeholder Textfeld">
        </div>

        <div class="form-group">
            <label>Zeit sitzend (Stunden)</label> <input type="number" class="form-control" name="timeSitting" placeholder="Placeholder Textfeld">
        </div>

        <div class="form-group">
            <label>Zeit Büro (Stunden)</label> <input type="number" class="form-control" name="timeWork" placeholder="Placeholder Textfeld">
        </div>

        <div class="form-group">
            <label>Zeit stehend/gehend (Stunden)</label> <input type="number" class="form-control" name="timeStanding" placeholder="Placeholder Textfeld">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="button_name" value="Senden">
        </div>
        </form>
        <?php
            $gender = 0;
            $age = 0;
            $weight = 0;
            $height = 0;
            $returnIfNoValues = false;
            if(!empty($_REQUEST['gender'])){ 
                $gender = $_REQUEST['gender'];
            }else{
                echo("Kein Geschlecht angegeben</BR>");

                $returnIfNoValues = true;
            }
            if(!empty($_REQUEST['age'])){ 
                $age = $_REQUEST['age'];
            }else{
                echo("Kein Alter angegeben</BR>");
                $returnIfNoValues = true;
            }
            if(!empty($_REQUEST['weight'])){ 
                $weight = $_REQUEST['weight'];
            }else{
                echo("Kein Gewicht angegeben</BR>");
                $returnIfNoValues = true;
            }
            if(!empty($_REQUEST['height'])){ 
                $gender = $_REQUEST['height'];
            }else{
                echo("Kein Höhe angegeben</BR>");
                $returnIfNoValues = true;
            }

            if($returnIfNoValues){
                return;
            }

            $calories = 0.0;
            if($gender == 1){
                $calories = 66.47 + (9.6*$weight) + (1.8*$height) - (4.7*$age);
            }
            if($gender == 2){
                $calories = 65.51 + (13.7*$weight) + (5*$height) - (6.8*$age);
            }

            $timeSitting = 0;
            $timeWork = 0;
            $timeStanding = 0;
            $timeSleeping = 0;

            if(!empty($_REQUEST['timeSitting'])){ 
                $timeSitting = $_REQUEST['timeSitting'];
            }
            if(!empty($_REQUEST['timeWork'])){ 
                $timeWork = $_REQUEST['timeWork'];
            }
            if(!empty($_REQUEST['timeStanding'])){ 
                $timeStanding = $_REQUEST['timeStanding'];
            }

            if(($timeSitting+$timeWork+$timeStanding)>24){
                echo("Ein Tag hat nur 24 Stunden");
                return;
            }else{
                $timeSleeping = 24-$timeSitting-$timeWork-$timeStanding;
            }

            $calories = $calories + (($timeSitting*1.2)+($timeWork*1.45)+($timeStanding*1.85)+($timeSleeping*0.95))/24;
            echo("$calories Kalorien");
        ?>

    </body>
</html>
