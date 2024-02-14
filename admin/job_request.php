<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB REQUEST</title>
    <?php
        include_once("./include/header.php");
        include_once("../include/connect_db.php");
    ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php
                    include_once("./side_nav.php")
                ?>
            </div>

            <div class="col-md-10 content">
                <h5 class="text-center">JOB REQUESTS</h5>
                <div id="show"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function()
        {
            show();
            function show()
            {
                $.ajax({
                    url:"ajax_job_request.php",
                    method: "POST",
                    success:function(data)
                    {
                        $("#show").html(data);
                    }
                });
            }

            $(document).on('click', '.approve', function()
            {
                var id = $(this).attr("id"); 
                
                $.ajax({
                    url:"ajax_approve.php",
                    method: "POST",
                    data: {id:id},
                    success:function(data)
                    {
                        show();
                    }
                });
            });

            $(document).on('click', '.reject', function()
            {
                var id = $(this).attr("id"); 
                
                $.ajax({
                    url:"ajax_reject.php",
                    method: "POST",
                    data: {id:id},
                    success:function(data)
                    {
                        show();
                    }
                });
            });
        });
    </script>
    
</body>
</html>