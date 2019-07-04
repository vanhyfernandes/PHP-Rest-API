<html>

    <head>

    </head>
    <body>
        <!-- <form action="" method="POST">
            <label>Enter SID:</label><br />
            <input type="text" name="sid" placeholder="Enter SID" required/>
            <br /><br />
            <button type="submit" name="submit">Submit</button>
        </form>
-->
        <?php
            /*if (isset($_POST['sid']) && $_POST['sid']!="") {
                $sid = $_POST['sid'];
                $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php?sid=".$sid;
            } else {
                $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php";
            } */
            $url = "https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            $result = json_decode($result,true);
            curl_close($ch);

            echo "<table border='1'>";
            echo "<tr><td width='100'> SID </td> <td width='100'> First Name </td> <td width='100'> Second Name </td> <td width='100'> Email </td></tr>";
            
            $lengh = sizeof($result);
            for($i=0; $i < $lengh; $i++){
                echo "<tr>";
                echo "<td width='50'>";
                echo $result[$i]['sid'];
                echo "</td><td width='100'>";
                echo $result[$i]['fname'];
                echo "</td><td width='100'>";
                echo $result[$i]['sname'];
                echo "</td><td width='100'>";
                echo $result[$i]['email'];
                echo "</td></tr>";
            } 
                echo "</table>";
        ?>

    </body>

</html>