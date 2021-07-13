

<section class="section-50 section-md-75 section-xl-100">
    <div class="container">
        <h3>სტატიები</h3>
        <div class="row row-40 row-offset-1 justify-content-sm-center justify-content-md-start">
            <?php if ($iSmobile): ?>
            <?php foreach  ($posts as $post):?>
                <div onclick="javascript:document.location.href='http://www.honest.ge/post/<?php echo $post['id'] ?>' "
                     class="card mb-3 mr-2 "
                     style="max-width: 400px; min-width: 400px">
                    <div class="row no-gutters">
                        <div class="col-5">
                            <img src="<?php echo base_url('assets/images/honest_logo_min_extra.jpg'); ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title"><?=$post['title'] ?></h5>
                                <div style="background-color: #6495ED; float: right"  class=" rounded text-white btn btn-primary">სრულად</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <?php foreach  ($posts as $post):?>
                <div class="card col-md-4" onclick="javascript:document.location.href='http://www.honest.ge/post/<?php echo $post['id'] ?>'">
                    <img class="card-img-top" src="<?php echo base_url('assets/images/honest_logo_min.jpg'); ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$post['title'] ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php endif;?>


        </div>
    </div>


</section>
