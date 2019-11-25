<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Bond Calc</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- CSS Template -->
    <link rel="stylesheet" href="../style.css" type="text/css">

    <!-- Script  -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<body>
    <?php   
            $servername = "localhost";
            $username = "id11704850_root";
            $password = "rootroot";
    
            // Create connection
            $conn = new mysqli($servername, $username, $password);
     
            // Selecting the database 
            $db_name="id11704850_bondcalc"; 
            $my_db_select = mysqli_select_db($conn, $db_name); 

            if($_POST){
                //Insert statement             
                $my_insert_query= "INSERT INTO `calcinfo`(`Id`, `Name`, `Price`, `Term`, `Rate`, `Depo`, `DateCreated`) VALUES ('Id12345','Andrea','10.00','30','6.5','5.00','2019-11-28 00:00:00')";

                /*
                $c = uniqid (rand (),true); 
                $date =date()
                "INSERT INTO `calcinfo`(`Id`, `Name`, `Price`, `Term`, `Rate`, `Depo`, `DateCreated`)  VALUES ($c,{$conn->real_escape_string($_POST['name'])},{$conn->real_escape_string($_POST['price'])},
                {$conn->real_escape_string($_POST['term'])},{$conn->real_escape_string($_POST['rate'])},{$conn->real_escape_string($_POST['rate'])},{$conn->real_escape_string($_POST['depo'])}, $date)";
                */    
             }
    ?>

    <!-- ========== HEADER ========== -->
    <header class="bg-dark ">
        <div class="container ">
            <div class="row justify-content-md-between">

                <div class="col-lg-12 order-lg-12 d-flex align-items-start flex-column pt-5 pb-5">
                    <div class="row">
                        <div class="col-2">
                            <!-- Logo -->
                            <img src="../logo.svg" alt="Logo" style="width: 75px; max-width: 100%;">
                            <!-- End Logo -->
                        </div>
                        <div class="col-10 mt-3" style="color:#fff">
                            <h1>SPACE CALCULATE</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">

        <!-- Hero Section -->
        <div class="gradient-overlay-half-white-v2 bg-img-hero" style="background-image: url(../heroImage.jpg);">

            <div class="d-lg-flex align-items-lg-center flex-lg-column pb-sm-6">
                <div class="container space-2 space-3--sm ">

                    <!-- Title -->
                    <div class="w-lg-50 mb-4 mb-sm-9 pb-1">
                        <h1 class="text-uppercase text-gray-700 font-weight-medium letter-spacing-0_06 mb-3">Welcome to Space Calculate</h1>
                        <h2 class="display-4 font-size-48--md-down mb-3">Calculate your monthly payment and be ready</h2>
                        <p>Enter the various details such as the purchase price, the deposit paid, paymentbond term in years and fixed interest rate so we can calculate your monthly. Enter only numeric values (no commas), using decimal points where needed.<br>Non-numeric values will cause errors.</p>
                    </div>
                    <!-- End Title -->

                    <form method="post" action="" name=loandata class="bg-white rounded shadow-sm p-5">

                        <div class="row">

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="text-uppercase font-weight-medium">Name of Calculation</label>
                                    <div id="datepickerWrapperTo" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <div id="calendarToLabel" class="input-group-text">
                                                <i class="svg-icon svg-icon-xs text-muted">
                                                    <img src="../name.png" alt="Logo" style="width: 25px; max-width: 100%;">
                                                </i>
                                            </div>
                                        </div>

                                        <input class="js-range-datepicker form-control bg-white text-muted" placeholder="Name Of Calculation" type="text" name="name" id="name" size="12">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label class="text-uppercase font-weight-medium">Purchase price</label>
                                    <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <div id="calendarFromLabel" class="input-group-text">
                                                <i class="text-muted">
                                                    <img src="../price.png" alt="Logo" style="width: 25px; max-width: 100%;">
                                                </i>
                                            </div>
                                        </div>

                                        <input id="price" class="js-range-datepicker form-control bg-white text-muted" placeholder="Purchase Price" type="text" name="principal" size="12" onchange="calculate();">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label class="text-uppercase font-weight-medium">Deposit paid</label>
                                    <div id="datepickerWrapperTo" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <div id="calendarToLabel" class="input-group-text">
                                                <i class="svg-icon svg-icon-xs text-muted">
                                                    <img src="../depo.png" alt="Logo" style="width: 25px; max-width: 100%;">
                                                </i>
                                            </div>
                                        </div>
                                        <input id="dep" class="js-range-datepicker form-control bg-white text-muted" placeholder="Deposit Paid" type="text" name="dep" size="12" onchange="calculate();">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label class="text-uppercase font-weight-medium">Bond term in years</label>
                                    <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <div id="calendarFromLabel" class="input-group-text">
                                                <i class="svg-icon svg-icon-xs text-muted">
                                                    <img src="../month.png" alt="Logo" style="width: 25px; max-width: 100%;">
                                                </i>
                                            </div>
                                        </div>
                                        <input id="term" class="js-range-datepicker form-control bg-white text-muted" placeholder="Bond Term In Years" type="text" name="years" size="12" onchange="calculate();">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-3">
                                    <label class="text-uppercase font-weight-medium">Fixed interest rate</label>
                                    <div id="datepickerWrapperTo" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <div id="calendarToLabel" class="input-group-text">
                                                <i class="svg-icon svg-icon-xs text-muted">
                                                    <img src="../intrest.png" alt="Logo" style="width: 25px; max-width: 100%;">
                                                </i>
                                            </div>
                                        </div>
                                        <input id="intr" class="js-range-datepicker form-control bg-white text-muted" placeholder="Fixed Interest Rate" type="text" name="interest" size="12" onchange="calculate();">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="text-uppercase font-weight-medium">Monthly payment</label>
                                    <div id="datepickerWrapperTo" class="u-datepicker input-group">
                                        <div class="input-group-prepend">
                                            <div id="calendarToLabel" class="input-group-text">
                                                <i class="svg-icon svg-icon-xs text-muted">
                                                    <img src="../pay.png" alt="Logo" style="width: 25px; max-width: 100%;">
                                                </i>
                                            </div>
                                        </div>
                                        <input disabled class="js-range-datepicker form-control bg-white text-muted" placeholder="Monthly Payment" type="text" name="payment" size="12">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row align-items-end">
                                    <div class="col-12 pl-0 pl-sm-3">
                                        <input class=" text-uppercase btn btn-primary d-block w-100 px-2 px-sm-12" type="button" value="Calculate" onclick="calc('tableDiv');">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <center>
                            <p>When <strong><u>Calculate</u></strong> is pressed a table shows the year and percentage of the repayments for that year that is paying off the interest on the loan vs the percentage that is paying off the capital amount.</p>

                            <div class="mb-5" id="dvTable"> </div>

                            <p>The stack bar graph illustrates how your payment amount vs the term of the loan would progress. </p>
                            <h3>Repayment splits</h3>
                            <div class="row">
                                <div class="col-1">Year</div>
                            </div>
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            Amount
                        </center>

                    </form>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->

        <!-- ========== FOOTER ========== -->
        <footer class="bg-dark ">
            <div class="container ">
                <div class="row justify-content-md-between">

                    <div class="col-lg-12 order-lg-12 d-flex align-items-start flex-column pt-5 pb-5">
                        <div class="row">
                            <div class="col-2">
                                <!-- Logo -->
                                <img src="../logo.svg" alt="Logo" style="width: 75px; max-width: 100%;">
                                <!-- End Logo -->
                            </div>
                            <div class="col-10 mt-3" style="color:#fff">
                                <h1>SPACE CALCULATE</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- ========== END FOOTER ========== -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS -->
    <script language="JavaScript">
        //Validation name start
        function calc(ele) {
            var name = document.getElementById('name');
            if (name.value.length == 0) {
                alert("Enter a calculation name");
                return false;
            } else {
                return price(ele);
            }
        }
        //Validation name end

        //Validate price start
        function price(ele) {
            var name = document.getElementById('price');
            if (name.value.length == 0) {
                alert("Enter your price");
                return false;
            } else {
                return depo(ele);
            }
        }
        //Validate price end

        //Validate deposito start
        function depo(ele) {
            var name = document.getElementById('dep');
            if (name.value.length == 0) {
                alert("Enter your deposito");
                return false;
            } else {
                return term(ele);
            }
        }
        //Validate deposito end

        //Validate term start
        function term(ele) {
            var name = document.getElementById('term');
            if (name.value.length == 0) {
                alert("Enter your bond term");
                return false;
            } else {
                return intrest(ele);
            }
        }
        //Validate term end

        //Validate intrest start
        function intrest(ele) {
            var name = document.getElementById('intr');
            if (name.value.length == 0) {
                alert("Enter your intrest rate");
                return false;
            } else {

                //calculation start
                var principal = document.loandata.principal.value;
                var dep = document.loandata.dep.value;
                var interest = document.loandata.interest.value / 100 / 12;
                var payments = document.loandata.years.value * 12;
                var term = document.loandata.years.value;
                var loadAmount = principal - dep;
                var name = document.loandata.name.value;

                var x = Math.pow(1 + interest, payments);
                var monthly = (loadAmount * x * interest) / (x - 1);
                if (!isNaN(monthly) &&
                    (monthly != Number.POSITIVE_INFINITY) &&
                    (monthly != Number.NEGATIVE_INFINITY)) {
                    document.loandata.payment.value = round(monthly);
                } else {
                    document.loandata.payment.value = "";
                }
                //calculation end

                //Show table start 
                var contentItems = new Array();
                contentItems.push(["Year", "Intrest %", "Capital %"]);
                var i;
                var a = round(totalAmount);
                var b = round(totalIntresAmount);
                var yearPayment = round(monthly * 12);
                var totalAmount = monthly * term;
                var totalIntresAmount = principal - totalAmount;


                var totalIntrest = monthly * 12 * term;
                var sum = yearPayment;
                var number = 0;

                while (number < term) {
                    if (sum >= loadAmount && sum >= totalIntrest) {
                        contentItems.push([number + 1, '100', '100']);
                    } else if (sum < loadAmount) {
                        var capitalLeft = loadAmount - sum;
                        var capitalLeftPer = round(capitalLeft / loadAmount * 100);
                        contentItems.push([number + 1, '0', capitalLeftPer]);
                    } else if (sum > loadAmount && sum < totalIntrest) {
                        var intrsetAmountLeft = totalIntrest - sum;
                        var intrsetAmountLeftPer = round(intrsetAmountLeft / totalIntrest * 100);
                        contentItems.push([number + 1, intrsetAmountLeftPer, '100']);
                    }

                    sum += sum;
                    number++;
                }

                //Create a HTML Table element.
                var table = document.createElement("TABLE");
                table.border = "1";

                //Get the count of columns.
                var columnCount = contentItems[0].length;

                //Add the header row.
                var row = table.insertRow(-1);
                for (var i = 0; i < columnCount; i++) {
                    var headerCell = document.createElement("TH");
                    headerCell.innerHTML = contentItems[0][i];
                    row.appendChild(headerCell);
                }

                //Add the data rows.
                for (var i = 1; i < contentItems.length; i++) {
                    row = table.insertRow(-1);
                    for (var j = 0; j < columnCount; j++) {
                        var cell = row.insertCell(-1);
                        cell.innerHTML = contentItems[i][j];
                    }
                }

                var dvTable = document.getElementById("dvTable");
                dvTable.innerHTML = "";
                dvTable.appendChild(table);

                //Show table end 

            }
        }
        //Validate intrest end

        //Decimal start
        function round(x) {
            return Math.round(x * 100) / 100;
        }
        //Decimal end

        //Chart start
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: ""
                },
                axisX: {
                    valueFormatString: "YYYY"
                },
                axisY: {
                    prefix: "R"
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                },
                data: [{
                        type: "stackedBar",
                        name: "",
                        showInLegend: "true",
                        xValueFormatString: "",
                        yValueFormatString: "R#,##0",
                        dataPoints: [{
                                x: new Date(2019, 0, 01),
                                y: 12
                            },
                            {
                                x: new Date(2020, 0, 01),
                                y: 24
                            },
                            {
                                x: new Date(2021, 0, 01),
                                y: 48
                            },
                            {
                                x: new Date(2022, 0, 01),
                                y: 60
                            },
                            {
                                x: new Date(2023, 0, 01),
                                y: 72
                            },
                            {
                                x: new Date(2024, 0, 01),
                                y: 84
                            },
                            {
                                x: new Date(2025, 0, 01),
                                y: 96
                            }
                        ]
                    }

                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        }
        //Chart end

    </script>

</body>

</html>
