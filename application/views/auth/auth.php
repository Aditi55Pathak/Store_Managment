<!DOCTYPE html>
<html>

<head>
    <title>Store Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/bootstrap/js/bootstrap.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('theme/bootstrap/css/bootstrap.css'); ?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/form-validator/jquery.form-validator.min.js') ?>">
    </script>
    <link rel="stylesheet" href="<?php echo base_url('theme/project/css/loader.css'); ?>" type='text/css' media="all" />
    <script type="text/javascript" src="<?php echo base_url('theme/project/js/notify.min.js') ?>"></script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Nunito');
        @import url('https://fonts.googleapis.com/css?family=Poiret+One');

        body,
        html {
            height: 100%;
            background-repeat: no-repeat;
            background-image: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 15, 121, 1) 12%, rgba(143, 5, 177, 1) 38%, rgba(0, 212, 255, 1) 100%);
            background: black;
            position: relative;
        }

        #login-box {
            position: absolute;
            top: 0px;
            left: 50%;
            transform: translateX(-50%);
            width: 350px;
            margin: 0 auto;
            border: 1px solid black;
            background: rgba(48, 46, 45, 1);
            min-height: 250px;
            padding: 20px;
            z-index: 9999;
        }

        #login-box .logo .logo-caption {
            font-family: 'Poiret One', cursive;
            color: black;
            text-align: center;
            margin-bottom: 0px;
        }

        #login-box .logo .tweak {
            color: #ff5252;
        }

        #login-box .controls {
            padding-top: 30px;
        }

        #login-box .controls input {
            border-radius: 0px;
            background: rgb(98, 96, 96);
            border: 0px;
            color: white;
            font-family: 'Nunito', sans-serif;
        }

        #login-box .controls input:focus {
            box-shadow: none;
        }

        #login-box .controls input:first-child {
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
        }

        #login-box .controls input:last-child {
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
        }

        #login-box button.btn-custom {
            border-radius: 2px;
            margin-top: 8px;
            background: #ff5252;
            border-color: rgba(48, 46, 45, 1);
            color: white;
            font-family: 'Nunito', sans-serif;
        }

        #login-box button.btn-custom:hover {
            -webkit-transition: all 500ms ease;
            -moz-transition: all 500ms ease;
            -ms-transition: all 500ms ease;
            -o-transition: all 500ms ease;
            transition: all 500ms ease;
            background: rgba(48, 46, 45, 1);
            border-color: #ff5252;
        }

        #particles-js {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: 50% 50%;
            position: fixed;
            top: 0px;
            z-index: 1;
        }
    </style>
    <script type="text/javascript">
        $.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function() {
            particlesJS('particles-js', {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 5,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true,
                "config_demo": {
                    "hide_card": false,
                    "background_color": "#b61924",
                    "background_image": "",
                    "background_position": "50% 50%",
                    "background_repeat": "no-repeat",
                    "background_size": "cover"
                }
            });

        });
    </script>
    <script>
        var baseurl = "<?php echo base_url(); ?>";
    </script>
</head>

<body>
    <div id="load"></div>
    <div class="container">
        <div id="login-box" style="background: rgba(255,255,255,0.8);margin-top:70px;">
            <div class="logo">
                <img src="<?php echo base_url('theme/img/gpblogo.jpg'); ?>" class="img img-responsive center-block" style="height:150px;" />
                <h1 class="logo-caption" style="font-family:times new roman;"><b>Store Management</b></h1>
            </div>
            <div class="controls">
                <?php
                if (isset($msg)) {
                    echo "<div id='popupunder' class='popupunder alert alert-danger fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>$msg</div>";
                }
                ?>
                <form id="login">
                    <input type="text" name="username" data-validation="required" placeholder="Username" class="form-control" style="margin-bottom:7px;" />
                    <input type="password" name="password" data-validation="required" placeholder="Password" class="form-control" />
                    <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>

    <script type="text/javascript">
        $('.popupunder').show();
        window.setTimeout(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(this).remove();
            });
        }, 500);
    </script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#load').hide();
            $.validate({
                form: '#login',
                modules: 'location, date, security, file',
                validateOnBlur: false,
                onSuccess: function($form) {
                    var frm = document.getElementById('login');
                    var frmdt = new FormData(frm);
                    jQuery.ajax({
                        url: baseurl + 'auth',
                        type: 'POST',
                        data: frmdt,
                        processData: false,
                        contentType: false,
                        async: true,
                        beforeSend: function(data) {
                            $('#load').show();
                        },
                        complete: function(data) {
                            $('#load').hide();
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data.code == 200) {
                                $.notify('Logged In', 'success');
                                window.location.href = data.target;
                            } else {
                                $.notify(data.message, 'error');

                            }
                        }
                    });
                    return false;
                }
            });
        });
    </script>
</body>

</html>