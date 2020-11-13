<!-- Modal Construction-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="padding: 0">
                <section class="card" style="border-radius: 0">
                    <div class="card-body" style="padding: 10px">
                        <div class="top-search-form">
                            <form>
                                <input class="form-control" id="search" type="text" placeholder="<?php echo $lang['enterYourKeyword']; ?>"
                                       style="height: 40px;width: 100%;max-width: none" autofocus>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
            <div class="modal-footer" style="text-align: center;display: block">
                <button type="submit" name="submit_status" id="status_btn" onclick="searchBtn()"
                        class="btn btn-success" style="padding: 3px 25px;"><?php echo $lang['search']; ?>
                </button>
                <button class="btn btn-info" data-dismiss="modal" style="padding: 3px 25px;"><?php echo $lang['close']; ?></button>

            </div>
        </div>
    </div>
</div>