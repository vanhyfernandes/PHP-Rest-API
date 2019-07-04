<html>

    <head>

    </head>
    <body>
        <?php

            echo "<form action='create_api.php' method='get'>";
            echo "<label>SID:</label><br />";
            echo "<input type='text' name='sid' placeholder='Enter SID' required/>";
            echo "<br /><br/>";
            echo "<label>First Name:</label><br />";
            echo "<input type='text' name='fname' placeholder='Enter First Name' required/>";
            echo "<br /><br/>";
            echo "<label>Second Name:</label><br />";
            echo "<input type='text' name='sname' placeholder='Enter Second Name' required/>";
            echo "<br /><br/>";
            echo "<label>Email:</label><br />";
            echo "<input type='text' name='email' placeholder='Enter Email' required/>";
            echo "<br /><br/>";

            echo "<button type='submit' name='submit' value='create'>Submit</button>";
            echo "</form>";

            if($_GET['submit']=="create"){
                $sid = $_GET['sid'];
                $fname = $_GET['fname'];
                $sname = $_GET['sname'];
                $email = $_GET['email'];
                
                $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/create.php?submit=create&sid=".$sid."&fname=".$fname."&sname=".$sname."&email=".$email;
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
                echo "<table border='1'>";
                echo "<tr><td width='100'> SID </td> <td width='100'> First Name </td> <td width='100'> Second Name </td> <td width='100'> Email </td></tr>";
                $lengh = sizeof($result);
                for($i=0; $i < $lengh; $i++){
                    $sid = $result[$i]['sid'];
                    $fname = $result[$i]['fname'];
                    $sname = $result[$i]['sname'];
                    $email = $result[$i]['email'];

                    echo "<tr>";
                    echo "<td width='100'>";
                    echo "$sid";
                    echo "</td><td width='100'>";
                    echo "$fname";
                    echo "</td><td width='100'>";
                    echo "$sname";
                    echo "</td><td width='100'>";
                    echo "$email";
                    echo "</td></tr>";
                } 
                echo "</table>";
            }
            else {
                echo "There are no more results!";
            }
            ?>

    </body>

</html>