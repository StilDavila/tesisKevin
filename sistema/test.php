<?php
require_once("php/conexion.php");
$idTest = $_GET['id'];

$contadorAlimentacion = 1;
$contadorGenetica = 1;
$contadorActividadFisica = 1;
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Table Layout - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container sbar_collapsed">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu" hidden>
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Examen</span></a>
                                <ul class="collapse">
                                    <li><a href="listaTest.php">Lista de Test</a></li>
                                    <li class="active"><a href="test.php">Test</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Variable</span></a>
                                <ul class="collapse">
                                    <li><a href="listaVariable.php">Lista de variables</a></li>
                                    <li><a href="graficoVariable.php">Gráfico variables</a></li>

                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <!-- <span></span>
                            <span></span>
                            <span></span> -->
                        </div>
                        
                    </div>
                    <!-- profile info & task notification -->
                    
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">TEST</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Test de Evaluación</a></li>
                                <li><span>Test Diabetes</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <!-- <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/logo.jpg" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Administrador </h4>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                    <div class="row">
                        <!-- nav tab start -->
                        <div class="col-lg-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="home" aria-selected="true">Datos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="alimentacion-tab" data-toggle="tab" href="#alimentacion" role="tab" aria-controls="profile" aria-selected="false">Alimentación</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="genetica-tab" data-toggle="tab" href="#genetica" role="tab" aria-controls="contact" aria-selected="false">Genética</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="glucosa-tab" data-toggle="tab" href="#glucosa" role="tab" aria-controls="contact" aria-selected="false">Glucosa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="actividadFisica-tab" data-toggle="tab" href="#actividadFisica" role="tab" aria-controls="contact" aria-selected="false">Actividad Física</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="home-tab">
                                        <form action="#" id='frmDatos'>
                                            <input type="hidden" id="txtIdTest" value="<?php echo $idTest?>">
                                            <div class="login-form-body">
                                                <div class="form-gp">
                                                    <label required>Dni</label>
                                                    <input type="text" id="txtDni">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <div class="form-gp">
                                                    <label required>Nombre</label>
                                                    <input type="text" id="txtNombre">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <div class="form-gp">
                                                    <label required>Edad</label>
                                                    <input type="text" id="txtEdad">
                                                    <i class="ti-user"></i>
                                                </div>
                                                <div class="form-gp">
                                                    <label>Correo</label>
                                                    <input type="email" id="txtCorreo">
                                                    <i class="ti-email"></i>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" id="txtSexo">
                                                        <option selected disabled>SEXO</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="submit-btn-area">
                                                    <button id="" type="submit" onclick="$('#alimentacion-tab').trigger('click');">Siguiente <i class="ti-arrow-right"></i></button>                                                   
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="tab-pane fade" id="alimentacion" role="tabpanel" aria-labelledby="profile-tab">
                                            <p>Alimentación</p>
                                            <?php 
                                                $sql = "select * from pregunta where id_variable=1 order by rand() limit 5";
                                                $result = $cnx->query($sql) or die("error");
                                                while($reg = $result->fetchObject()){
                                                    echo '
                                                    <div class="form-group">
                                                        <label class="col-form-label">'.$reg->nombre.'</label>
                                                        <select class="custom-select" id="respuestaAlimentacion'.$contadorAlimentacion.'">
                                                            <option disabled>Elija una opción</option>
                                                            <option selected value="0.2">Bajo</option>
                                                            <option value="0.8">Mediano</option>
                                                            <option value="1.4">Alto</option>
                                                        </select>
                                                    </div>
                                                    ';
                                                    $contadorAlimentacion++;

                                                }
                                            ?>
                                            <!-- <button onclick="calcularAlimentacion()">Calcular</button>     -->
                                            <div class="submit-btn-area">
                                                <button id="" type="button" onclick="$('#genetica-tab').trigger('click')">Siguiente <i class="ti-arrow-right"></i></button>                                                   
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="genetica" role="tabpanel" aria-labelledby="contact-tab">
                                            <p>Genetica</p>
                                            <?php 
                                                $sql = "select * from pregunta where id_variable=2 order by rand() limit 5";
                                                $result = $cnx->query($sql) or die("error");
                                                while($reg = $result->fetchObject()){
                                                    echo '
                                                    <div class="form-group">
                                                        <label class="col-form-label">'.$reg->nombre.'</label>
                                                        <select class="custom-select" id="respuestaGenetica'.$contadorGenetica.'">
                                                            <option disabled>Elija una opción</option>
                                                            <option selected value="1">Si</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                    ';
                                                    $contadorGenetica++;
                                                }
                                            ?>  
                                            <!-- <button onclick="calcularGenetica()">Calcular</button> -->
                                            <div class="submit-btn-area">
                                                <button id="" type="button" onclick="$('#glucosa-tab').trigger('click')">Siguiente <i class="ti-arrow-right"></i></button>                                                   
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="glucosa" role="tabpanel" aria-labelledby="contact-tab">
                                            <p>Glucosa</p>
                                            <?php 
                                                $sql = "select * from pregunta where id_variable=3 limit 1";
                                                $result = $cnx->query($sql) or die("error");
                                                while($reg = $result->fetchObject()){
                                                    echo '
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">'.$reg->nombre.'</label>
                                                        <input class="form-control" type="number" value="90" id="txtGlucosa" name="txtGlucosa">
                                                    </div>
                                                    ';
                                                }
                                            ?>
                                            <!-- <button onclick="calcularGlucosa()">Calcular</button>   -->
                                            <div class="submit-btn-area">
                                                <button id="" type="button" onclick="$('#actividadFisica-tab').trigger('click')">Siguiente <i class="ti-arrow-right"></i></button>                                                   
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="actividadFisica" role="tabpanel" aria-labelledby="contact-tab">
                                            <p>Actividad Fisica</p>
                                            <?php 
                                                $sql = "select * from pregunta where id_variable=4 order by rand() limit 3";
                                                $result = $cnx->query($sql) or die("error");
                                                while($reg = $result->fetchObject()){
                                                    echo '
                                                    <div class="form-group">
                                                        <label class="col-form-label">'.$reg->nombre.'</label>
                                                        <select class="custom-select" id="respuestaActividadFisica'.$contadorActividadFisica.'">
                                                            <option  disabled>Elija una opción</option>
                                                            <option selected value="0.6">Bajo</option>
                                                            <option value="1.3">Normal</option>
                                                            <option value="2.3">Alto</option>
                                                        </select>
                                                    </div>
                                                    ';
                                                    $contadorActividadFisica++;
                                                }
                                            ?>  
                                            <!-- <button onclick="calcularActividadFisica()">Calcular</button> -->
                                            <!-- <button onclick="calcularRiesgo()">Calcular riesgo</button> -->
                                            <!-- <button onclick="calcularRiesgo()">OBTENER RIESGO</button> -->
                                            <div class="submit-btn-area">
                                                <button id="" type="button" onclick="calcularRiesgo()">Finalizar <i class="ti-arrow-right"></i></button>                                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Funciones -->
    <script type="text/javascript" src='../sistema/js/funciones.js'></script>

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
