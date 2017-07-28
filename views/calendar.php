<?php
include_once 'configuration.php';
include_once 'controllers/calendarCtrl.php';
include_once 'models/events.php';
?>
<h1>Calendrier des évènements</h1>
<div class="container">
    <div class="row">
        <div class="periods col-md-12 col-sm-12 col-xs-12">
            <div class="year"><?php echo $year; ?></div>
            <div class="months">
                <ul>
                    <?php foreach ($months as $id => $m): ?>
                        <li><a href="#" id="linkMonth<?php echo $id + 1; ?>"><?php echo utf8_encode(substr(utf8_decode($m), 0, 4)); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="clear"></div>
            <?php $dates = current($dates); ?>
            <?php foreach ($dates as $m => $days): ?>
                <div class="month relative" id="month<?php echo $m; ?>">
                    <table>
                        <thead>
                            <tr>
                                <?php foreach ($daysWeek as $d => $dName): ?>
                                    <th><?php echo substr($dName, 0, 3); ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $end = end($days);
                                foreach ($days as $d => $w):
                                    ?>
                                    <?php $time = strtotime("$year-$m-$d"); ?>
                                    <?php if ($d == 1 && $w != 1): ?>
                                        <td colspan="<?php echo $w - 1; ?>" class="padding"></td>
                                    <?php endif; ?>
                                    <td class="days <?php if ($time == strtotime(date('Y-m-d'))): ?>today<?php endif; ?>" id="<?= $time ?>">
                                        <div class="relative">
                                            <div class="day"><?php echo $d; ?></div>
                                        </div>
                                        <div class="daytitle">
                                            <?php echo $daysWeek[$w - 1]; ?> <?php echo $d; ?>  <?php echo $months[$m - 1]; ?>
                                        </div>

                                        <ul class="events">
                                            <?php foreach ($events as $e): ?>
                                                <?php if (strtotime($e->startDate) == $time): ?>
                                                    <li id="styleList"><ul class="list-unstyled test style">                                                    
                                                            <li><?php echo $e->name; ?></li>

                                                        </ul></li>
                                                    <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </ul>
                                    </td>
                                    <?php if ($w == 7): ?>
                                    </tr><tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($end != 7): ?>
                                    <td colspan="<?php echo 7 - $end; ?>" class="padding"></td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="clear"></div>
<script src="../assets/library/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/library/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script>
    $(function () {
        $('.month').hide();
        $('.month:first').show();
        $('.months a:first').addClass('active');
        var current = 1;
        $('.months a').click(function () {
            var month = $(this).attr('id').replace('linkMonth', '');
            if (month != current) {
                $('#month' + current).slideUp();
                $('#month' + month).slideDown();
                $('.months a').removeClass('active');
                $('.months a#linkMonth' + month).addClass('active');
                current = month;
            }
            return false;
        });
    });
</script>
<div class="modal fade style" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liste des évènements de la journée</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
