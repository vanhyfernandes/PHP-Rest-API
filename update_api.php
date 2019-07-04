<html>

    <head>

    </head>
    <body>
        <?php

            if($_GET['submit']=="update" && $_GET['sid']){

                $sid = $_GET['sid'];

                $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php?sid=".$sid;
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                $result = curl_exec($ch);
                $result = json_decode($result,true);
                curl_close($ch);
                $count = count($result);
                for($i=0; $i < $count; $i++){
                    $sid = $result[$i]['sid'];
                    $fname = $result[$i]['fname'];
                    $sname = $result[$i]['sname'];
                    $email = $result[$i]['email'];
                }
            }

            echo "<form action='update_api.php' method='get'>";
            echo "<label>SID:</label><br />";
            echo "<input type='text' name='sid' value='$sid' readonly='readonly'/>";
            echo "<br /><br/>";
            echo "<label>First Name:</label><br />";
            echo "<input type='text' name='fname' value='$fname' required/>";
            echo "<br /><br/>";
            echo "<label>Second Name:</label><br />";
            echo "<input type='text' name='sname' value='$sname' required/>";
            echo "<br /><br/>";
            echo "<label>Email:</label><br />";
            echo "<input type='text' name='email' value='$email' required/>";
            echo "<br /><br/>";

            echo "<button type='submit' name='submit' value='update'>Submit</button>";
            echo "</form>";

            if($_GET['submit']=="update" && $_GET['sid']!="" && $_GET['fname']!="" && $_GET['sname']!="" && $_GET['email']!=""){
                $sid = $_GET['sid'];
                $fname = $_GET['fname'];
                $sname = $_GET['sname'];
                $email = $_GET['email'];
                
                $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/update.php?submit=update&sid=".$sid."&fname=".$fname."&sname=".$sname."&email=".$email;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($ch);
                $result = json_decode($result);
                //var_dump($result);
                curl_close($ch);
            }

            $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            $result = json_decode($result,true);
            curl_close($ch);

            if ($result!=NULL) {
                echo "<form action='update_api.php' method='get'>";
                echo "<table border='1'>";
                echo "<tr> <td width='50'> </td> <td width='100'> SID </td> <td width='100'> First Name </td> <td width='100'> Second Name </td> <td width='100'> Email </td></tr>";
                $count = count($result);
                for($i=0; $i < $count; $i++){
                    $sid = $result[$i]['sid'];
                    $fname = $result[$i]['fname'];
                    $sname = $result[$i]['sname'];
                    $email = $result[$i]['email'];

                    echo "<tr>";
                    echo "<td width='50'>";
                    echo "<input type='radio' name='sid' value='$sid'>";
                    echo "</td><td width='100'>";
                    echo "$sid";
                    echo "</td><td width='100'>";
                    echo "$fname";
                    echo "</td><td width='100'>";
                    echo "$sname";
                    echo "</td><td width='100'>";
                    echo "$email";
                    echo "</td></tr>";
                } 
                echo "</table><input type='submit' name='submit' value='update'></form>";
            }
            else {
                echo "There is no more results!";
            }
            ?>

    </body>

</html>