<div class="row">
    <div class="col-md-12">
        <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo( 'url' ) ?>">
            <div class="mx-4">
                <div class="input-group">
                    <label class="screen-reader-text" for="s">Volltextsuche nach:</label>
                    <input type="text" name="s" id="s" class="form-control" placeholder="Volltextsuche" aria-label="volltext"
                           aria-describedby="plz">
                    <div class="input-group-append fl-button-wrap fl-button-width-auto fl-button-left fl-button-has-icon">
                        <button type="submit" class="fl-button" role="button">
                            <i class="material-icons" aria-hidden="true">search</i>
                            <span class="fl-button-text">Suchen</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>