<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 12.11.18
 * Time: 12:54
 */

use frontend\widgets\AlertWidget;
use \yii\helpers\Url;
use \frontend\widgets\BreadcrumbsWidget;
?>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Alerts -->
    <!-- ============================================================== -->
    <div class="alert-block">
        <?php if (count(Yii::$app->session->getAllFlashes())) {
            echo AlertWidget::widget() . '<br/>';
        } ?>
    </div>
    <!-- ============================================================== -->
    <!-- END Alerts -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Fix-header-sidebar</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <?= BreadcrumbsWidget::widget([
                    'links' => $this->params['breadcrumbs'] ?? [],
                ]);
                ?>
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
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
