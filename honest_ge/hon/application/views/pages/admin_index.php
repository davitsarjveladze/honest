<section class="bg-whisper">
    <div class="container">
        <div class="row">
                    <h3>პოსტის დამატება</h3>
                        <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/addpost">
                            <div class="row row-30">
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <input class="form-input" id="request-form-name" type="text" name="title" data-constraints="@Required">
                                        <label class="form-label" for="request-form-name">სახელი</label>
                                    </div>
                                </div>
                                <div  class="col-md-6" >
                                    &lt;br&gt; იმისთვის რომ ახალ ხაზზე ჩამოიტანოს დაიწყოს ; &lt;hr&gt; იმისთვის რომ ხაზი გააკეთოს
                                    &lt;b&gt; &lt;/b&gt;<b> სიტყვა ან წინადადება ამათ შორის უნდა ჩასვათ თუ გინდათ რომ მუქად ჩანდეს</b>
                                    &lt;p&gt;&lt;/p&gt; ეს აბაზცია და შეგიძლიათ აბზაცები ამაში ჩაწერით გამოყოთ   &lt;mark&gt;  &lt;/mark&gt; <mark>აკეთებს მარკირებას  ესე </mark>
                                    &lt;i&gt;&lt;/i&gt; <i>ეს ტექსტს აჩენს ესე</i>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-wrap">
                                        <textarea class="form-input" id="contact-message" name="text" data-constraints="@Required"></textarea>

                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="row justify-content-end">
                                        <div class="col-md-6">
                                            <button class="button button-block button-primary" type="submit">პოსტის დამატება</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

        </div>
    </div>
    <div class="container">
        <h3>პოსტის წაშლა</h3>
        <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/deletePost">
        <?php foreach ($posts as $post): ?>
            <div class="alert alert-danger"  role="alert">
                <?= $post['title']?> <input name="ID[]" value="<?= $post['id']?>" type="checkbox">
            </div>
        <?php endforeach;?>
            <button type="submit" class="btn btn-danger " >წაშლა</button>
        </form>

    </div>
</section>
