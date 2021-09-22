<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #cityList {
            position: fixed;
            width: 27.3%;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="row justify-content-center bg-warning">
                <div class="col-md-6">
                    <h3>AJAX LOAD RECORDS USING SELECT BOX IN PHP</h3>
                </div>
            </div>

        </header>
        <div class="row mt-2 bg-dark text-white py-5 justify-content-end">
            <div class="col-md-4">
                <input type="text" placeholder="Search here.." id="autocomplete" class="form-control" autocomplete="off">
                <div class="list-group" id="cityList">
                    <!-- <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                        The current button
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">A second item</button>
                    <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                    <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button> -->
                </div>
            </div>
            <div class="col-2">
                <input type="submit" id="submitBtn" value="Submit" class="btn btn-primary">
            </div>

        </div>

        <div class="row mt-2 d-none" id="tableRow">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody id="tableData">

                </tbody>
            </table>
        </div>
    </div>



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#autocomplete").keyup(function() {
                var city = $(this).val();
                if (city != '') {
                    $.ajax({
                        url: "load-city-fetch-data.php",
                        type: "POST",
                        data: {
                            city: city
                        },
                        success: function(data) {
                            $("#cityList").fadeIn("fast").html(data);
                        }
                    })
                } else {
                    $("#cityList").fadeOut("fast").html("");
                }
            })

            $(document).on("mouseover", "#cityList .list-group-item", function() {
                $(this).addClass("active")
            })
            $(document).on("mouseout", "#cityList .list-group-item", function() {
                $(this).removeClass("active")
            })


            $(document).on("click", "#cityList .list-group-item", function() {
                $("#autocomplete").val($(this).text());
                $("#cityList").fadeOut("fast").html("");
            })



            // LOAD DATA
            $("#submitBtn").click(function() {
                var cityName = $("#autocomplete").val();

                if (cityName == "") {
                    alert("Please enter the city name")
                } else {
                    $.ajax({
                        url: "load-city-fetch-data.php",
                        type: "POST",
                        data: {
                            cityName: cityName
                        },
                        success: function(data) {
                            $("#tableRow").removeClass("d-none")
                            $("#tableData").html(data)
                        }
                    })
                }
            })
        })
    </script>
</body>

</html>