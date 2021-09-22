<?php

    $conn = mysqli_connect("localhost","root","","test1") or die("Connection Failed.!");

    if(isset($_POST['city'])){
        $city = $_POST['city'];
        $sql = "SELECT distinct(city) FROM employee WHERE city LIKE '%{$city}%'";
        $result = mysqli_query($conn,$sql) or die("Query Failed.!");

        $output = "";
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
                $output .= "<button type='button' class='list-group-item list-group-item-action'>{$row['city']}</button>";
            }

        }else{
            $output =  "<button type='button' class='list-group-item list-group-item-action disabled'> City not found..!</button>";
        }
        echo $output;
    }
   
    if(isset($_POST['cityName'])){
        $city = $_POST['cityName'];
        $sql = "SELECT * FROM employee WHERE city = '{$city}' ";
        $result = mysqli_query($conn,$sql) or die("Query Failed.!");

        $output = "";
        if(mysqli_num_rows($result) > 0){
            $sNo = 1;
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>{$sNo}</td>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['city']}</td>
                </tr>";
                $sNo++;
            }
        }else{
            echo "No Record Found.!";
        }
    }

?>