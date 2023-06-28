<?php
    if(isset($_POST['data'])){
        $pwd= getcwd();
        $data =  $_POST['data'];
        $taskcode = $_POST['code'];
        $workerID = $_POST['workerID'];
        $age = $_POST['age'];
        $gender =  $_POST['gender'];
        $race =  $_POST['race'];

        $details = "workerID, redemptionCode, age, gender, race"."\n".$workerID.", ".$taskcode.", ".$age.", ".$gender.", ".$race;

        $sendTo = "ankit.721302@gmail.com";
        $subject = $workerID." just finished their task ";
        $txt =  $workerID." just finished their task ".$taskcode." in ".$totalTime." milliseconds";
        $headers = "From: webexp@neuropsych.xyz" . "\r\n";
                
        mail($sendTo,$subject,$txt,$headers);

        mkdir($pwd."/results/$taskcode",0777);

        echo  "Your redemption code is:   ---   ".$taskcode."   ---   BEFORE PRESSING -OKAY-, please don't forget to COPY AND NOTEDOWN THIS REDEMPTION CODE to report in on Mechanical Turk.!";
        
        file_put_contents($pwd.'/results/'.$taskcode.'/data.csv', $data);
        file_put_contents($pwd.'/results/'.$taskcode.'/details.csv', $details);
    }

?>