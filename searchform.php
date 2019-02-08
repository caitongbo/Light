<div id="modal-full" class="uk-modal-full uk-modal" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full" type="button" uk-close></button>
        <form method="get" action="<?php echo home_url('/'); ?>" class="uk-search">
            <input class="uk-search-input uk-text-center" name="s" type="search" placeholder="请输入..." value="<?php echo get_search_query(); ?>" autofocus>
        </form>
    </div>
</div>