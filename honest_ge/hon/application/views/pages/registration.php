<section class="bg-whisper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-7">
                <div class="section-50 section-md-75 section-xl-100">
                    <h3>რეგისტრაცია</h3>
                    <form class="" data-form-output="form-output-global" data-form-type="contact" method="post" action="/registrcheck">
                        <div class="row row-30">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-name" type="text" name="name" data-constraints="@Required">
                                    <label class="form-label" for="request-form-name">სახელი</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-phone" type="text" name="age" data-constraints="@Numeric @Required">
                                    <label class="form-label" for="request-form-phone">ასაკი</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-phone" type="password" name="password" data-constraints=" @Required">
                                    <label class="form-label" for="request-form-phone">პაროლი</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-email" type="password" name="password" data-constraints=" @Required">
                                    <label class="form-label" for="request-form-email">გაიმეორეთ პაროლი</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap form-wrap-outside">
                                    <!--Select 2-->
                                    <select class="form-input select-filter" id="request-form-select" name="question1" data-minimum-results-for-search="Infinity">
                                        <option>კითხვა I პაროლის აღდგენისთვის</option>
                                        <option value="1">რომელია შენი საყვარელი წიგნი?</option>
                                        <option value="2">რომელია შენი საყვარელი მწერალი?</option>
                                        <option value="3">რომელია შენი საყვარელი მუსიკის ჟანრი?</option>
                                        <option value="4">რომელია შენი საყვარელი მომღერალი?</option>
                                        <option value="5">რომელია შენი საყვარელი მსახიობი?</option>
                                        <option value="6">რომელია შენი საყვარელი ფილმი?</option>
                                        <option value="7">რომელია შენი საყვარელი სერიალი?</option>
                                        <option value="8">რომელია შენი საყვარელი შინაური ცხოველი?</option>
                                        <option value="9">რომელია შენი საყვრელი სპორტი?</option>
                                        <option value="10">რომელ ქალაქში დაიბადე?</option>
                                        <option value="11">რომელ ქალაქში გინდა მოგზაურობა?</option>
                                        <option value="12">რომელია შენი საყვარელი ფერი?</option>
                                        <option value="13">რომელია შენი საყვარელი თვე?</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-2" type="text" name="anserw1" data-constraints=" @Required">
                                    <label class="form-label" for="request-form-2">შეიყვანეთ I კითხვის პასუხი</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap form-wrap-outside">
                                    <!--Select 2-->
                                    <select class="form-input select-filter" id="request-form-select" name="question2" data-minimum-results-for-search="Infinity">
                                        <option>კითხვა II პაროლის აღდგენისთვის</option>
                                        <option value="1">რომელია შენი საყვარელი წიგნი?</option>
                                        <option value="2">რომელია შენი საყვარელი მწერალი?</option>
                                        <option value="3">რომელია შენი საყვარელი მუსიკის ჟანრი?</option>
                                        <option value="4">რომელია შენი საყვარელი მომღერალი?</option>
                                        <option value="5">რომელია შენი საყვარელი მსახიობი?</option>
                                        <option value="6">რომელია შენი საყვარელი ფილმი?</option>
                                        <option value="7">რომელია შენი საყვარელი სერიალი?</option>
                                        <option value="8">რომელია შენი საყვარელი შინაური ცხოველი?</option>
                                        <option value="9">რომელია შენი საყვრელი სპორტი?</option>
                                        <option value="10">რომელ ქალაქში დაიბადე?</option>
                                        <option value="11">რომელ ქალაქში გინდა მოგზაურობა?</option>
                                        <option value="12">რომელია შენი საყვარელი ფერი?</option>
                                        <option value="13">რომელია შენი საყვარელი თვე?</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-2" type="text" name="anserw2" data-constraints=" @Required">
                                    <label class="form-label" for="request-form-2">შეიყვანეთ II კითხვის პასუხი</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap form-wrap-outside">
                                    <!--Select 2-->
                                    <select class="form-input select-filter" id="request-form-select" name="question3" data-minimum-results-for-search="Infinity">
                                        <option>კითხვა III პაროლის აღდგენისთვის</option>
                                        <option value="1">რომელია შენი საყვარელი წიგნი?</option>
                                        <option value="2">რომელია შენი საყვარელი მწერალი?</option>
                                        <option value="3">რომელია შენი საყვარელი მუსიკის ჟანრი?</option>
                                        <option value="4">რომელია შენი საყვარელი მომღერალი?</option>
                                        <option value="5">რომელია შენი საყვარელი მსახიობი?</option>
                                        <option value="6">რომელია შენი საყვარელი ფილმი?</option>
                                        <option value="7">რომელია შენი საყვარელი სერიალი?</option>
                                        <option value="8">რომელია შენი საყვარელი შინაური ცხოველი?</option>
                                        <option value="9">რომელია შენი საყვრელი სპორტი?</option>
                                        <option value="10">რომელ ქალაქში დაიბადე?</option>
                                        <option value="11">რომელ ქალაქში გინდა მოგზაურობა?</option>
                                        <option value="12">რომელია შენი საყვარელი ფერი?</option>
                                        <option value="13">რომელია შენი საყვარელი თვე?</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="request-form-2" type="text" name="anserw3" data-constraints=" @Required">
                                    <label class="form-label" for="request-form-2">შეიყვანეთ III კითხვის პასუხი</label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="row justify-content-end">
                                    <div class="col-md-6">
                                        <button class="button button-block button-primary" type="submit">რეგისტრაცია</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
