<html>

<head>
    <title>Store Management</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('theme/bootstrap/css/bootstrap.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/bootstrap/js/bootstrap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/form-validator/jquery.form-validator.min.js') ?>">
    </script>
    <link rel="stylesheet" href="<?php echo base_url('theme/project/css/loader.css'); ?>" type='text/css' media="all" />
    <script type="text/javascript" src="<?php echo base_url('theme/project/js/notify.min.js') ?>"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js" integrity="sha512-t4CFex/T+ioTF5y0QZnCY9r5fkE8bMf9uoNH2HNSwsiTaMQMO0C9KbKPMvwWNdVaEO51nDL3pAzg4ydjWXaqbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css" integrity="sha512-nwpMzLYxfwDnu68Rt9PqLqgVtHkIJxEPrlu3PfTfLQKVgBAlTKDmim1JvCGNyNRtyvCx1nNIVBfYm8UZotWd4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/plugins/fontsize/trumbowyg.fontsize.min.js" integrity="sha512-eYBhHjpFi6wk8wWyuXYYu54CRcXA3bCFSkcrco4SR1nGtGSedgAXbMbm3l5X4IVEWD8U7Pur9yNjzYu8n4aIMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        var baseurl = "<?php echo base_url(); ?>";
        var basicset = [
            ['viewHTML'],
            ['fontsize'],
            ['undo', 'redo'],
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['insertImage'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ];
    </script>
    <style>
        .jqte_tool.jqte_tool_1 .jqte_tool_label {
            position: relative;
            display: block;
            padding: 3px;
            width: 70px;
            height: 16px;
            /* change it to 20px; */
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div id="load">

    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GPBHUJ STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class='nav-link <?php echo ($lid == 0) ? "active" : ""; ?>' href="<?php echo base_url('centralinward') ?>">Central Store Entry </a>
                    </li>
                    <li class="nav-item">
                    <a class='nav-link <?php echo ($lid == 1) ? "active" : ""; ?>' href="<?php echo base_url('allocate') ?>">Allocate</a>
                    </li>
                   <li class="nav-item">
                        <a class='nav-link <?php echo ($lid == 2) ? "active" : ""; ?>' href="">Deadstock Register</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link <?php echo ($lid == 3) ? "active" : ""; ?>' href="">Furniture Register</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link <?php echo ($lid == 4) ? "active" : ""; ?>' href="">Expendable Register</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link <?php echo ($lid == 5) ? "active" : ""; ?>' href="">Consumable Register</a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link <?php echo ($lid == 6) ? "active" : ""; ?>' href=" ">Change Password</a>
                    </li>

                </ul>
                <form class="d-flex">
                <li class="nav-item">
                <a class='nav-link <?php echo ($lid == 7) ? "active" : ""; ?>' href="<?php echo base_url('/admin/logout') ?>">Log out</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <?php
                        if (isset($title))
                            echo $title;
                        ?>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($page))
                            $this->load->view($page);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 
  <a class="nav-link active" href="<?php echo base_url('companies') ?>">Info</a>
  <li><a href="<?php echo base_url('index.php/Login/logout'); ?>">Logout</a></li> -->

    <script>
        $(document).ready(function() {
            $("#load").hide();
            $(function() {
                $('.dt').datepicker({
                    dateFormat: "dd-mm-yy"
                });
            });

        });
        $(document).delegate("#logout", "click", function(e) {
            e.preventDefault();
            jQuery.ajax({
                url: baseurl + 'logout',
                type: 'GET',
                async: true,
                beforeSend: function(data) {
                    $("#load").show();
                },
                complete: function(data) {
                    $("#load").hide();
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    </script>


</body>

</html>