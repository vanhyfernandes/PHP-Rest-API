<html>

    <head>

    </head>
    <body>
        <?php

            if($_GET['submit']=="delete" && $_GET['delete']!=""){
                $sid = intval($_GET['delete']);
                
                $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/delete.php?submit=delete&delete=".$sid;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($ch);
                $result = json_decode($result,true);
                //var_dump($result->status);
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
                echo "<form action='delete_api.php' method='get'>";
                echo "<table border='1'>";
                echo "<tr> <td width='50'> </td> <td width='100'> SID </td> <td width='100'> First Name </td> <td width='100'> Second Name </td> <td width='100'> Email </td></tr>";
                $lengh = sizeof($result);
                for($i=0; $i < $lengh; $i++){
                    $sid = $result[$i]['sid'];
                    $fname = $result[$i]['fname'];
                    $sname = $result[$i]['sname'];
                    $email = $result[$i]['email'];

                    echo "<tr>";
                    echo "<td width='50'>";
                    echo "<input type='radio' name='delete' value='$sid'>";
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
                echo "</table><input type='submit' name='submit' value='delete'></form>";
            }
            else {
                echo "There is no more results!";
            }
            ?>

    </body>

</html>