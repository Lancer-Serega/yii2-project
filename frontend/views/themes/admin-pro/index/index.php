<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 12.11.18
 * Time: 12:54
 */

use \yii\helpers\Url;
?>

<!-- ============================================================== -->
<!-- Horizontal navbar and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row hdr-nav-bar">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand hidden-lg-up">Horizontal Menu</a>
            <a class="navbar-toggler">
                <span class="ti-menu" data-toggle="collapse" data-target="#navbarText"></span>
            </a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <!-- Nav item -->
                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:void(0)">Home</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Inbox
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Mail Box</a>
                            <a class="dropdown-item" href="javascript:void(0)">Mailbox Detail</a>
                            <a class="dropdown-item" href="javascript:void(0)">Compose mail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Widgets</a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Forms</a>
                    </li>
                    <!-- Nav item -->
                </ul>
                <div class="call-to-act">
                    <div class="d-flex no-block">
                        <select class="custom-select hdr-bar m-r-10">
                            <option selected="">January 2017</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                        </select>
                        <div class="ml-auto">
                            <button type="button" class="btn btn-success btn-rounded">
                                <i class="fa fa-plus-circle m-r-5"></i>
                                Create New
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
            <i class="ti-settings text-white"></i>
        </button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Horizontal navbar and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Fix-header-sidebar</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Fix-header-sidebar</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-material floating-labels m-t-40">
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" id="input1">
                            <span class="bar"></span>
                            <label for="input1">Regular Input</label>
                        </div>
                        <div class="form-group m-b-40">
                            <input type="password" class="form-control" id="input2">
                            <span class="bar"></span>
                            <label for="input2">Password</label>
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" id="input3">
                            <span class="bar"></span>
                            <label for="input3">Placeholder</label>
                        </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" id="input4">
                            <span class="bar"></span>
                            <label for="input4">Helping text</label>
                            <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control" id="input5" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="input with tooltip!!">
                            <span class="bar"></span>
                            <label for="input5">Input with tooltip</label>
                        </div>
                        <div class="form-group m-b-40">
                            <select class="form-control p-0" id="input6">
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select><span class="bar"></span>
                            <label for="input6">Gender</label>
                        </div>
                        <div class="form-group m-b-5">
                            <textarea class="form-control" rows="4" id="input7"></textarea>
                            <span class="bar"></span>
                            <label for="input7">Text area</label>
                        </div>
                    </form>
                    <h4 class="card-title" id="1">1. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="22">2. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="3">3. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="4">4. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="5">5. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="6">6. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="7">7. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="8">8. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="9">9. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <h4 class="card-title m-t-40" id="10">10. Title will be here</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi.
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                    <p>
                        enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius
                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                        ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.
                        Nam quam nunc, blandit vel, luctus pulvinar,
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title">
                Service Panel
                <span><i class="ti-close right-side-toggle"></i></span>
            </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>

                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>

                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme working">7</a></li>
                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/1.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Varun Dhavan
                                            <small class="text-success">online</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/2.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Genelia Deshmukh
                                            <small class="text-warning">Away</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/3.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Ritesh Deshmukh
                                            <small class="text-danger">Busy</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/4.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Arijit Sinh
                                            <small class="text-muted">Offline</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/5.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Govinda Star
                                            <small class="text-success">online</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/6.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            John Abraham
                                            <small class="text-success">online</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/7.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Hritik Roshan
                                            <small class="text-success">online</small>
                                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/8.jpg')); ?>" alt="user-img" class="img-circle">
                            <span>
                                            Pwandeep rajan
                                            <small class="text-success">online</small>
                                        </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
