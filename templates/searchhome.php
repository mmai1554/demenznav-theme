<?php
$taxonomies = get_terms( [
	'taxonomy'   => 'klassifikation',
	'hide_empty' => false,
	'parent'     => 0
] );

?>
<div class="searchhome">
    <ul class="nav nav-tabs justify-content-center flex-sm-row flex-column" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="radius-tab" data-toggle="tab" href="#radius" role="tab" aria-controls="radius" aria-selected="true">Einrichtungen vor Ort</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="volltext-tab" data-toggle="tab" href="#volltext" role="tab" aria-controls="volltext" aria-selected="false">Allgemeine Suche</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="kreis-tab" data-toggle="tab" href="#kreis" role="tab" aria-controls="kreis" aria-selected="false">Landkreis</a>
        </li>
    </ul>
    <div class="tab-content h-100 row rounded" id="myTabContent">
        <!-- Tab 1 -->
        <div class="tab-pane col align-self-center fade show active" id="radius" role="tabpanel" aria-labelledby="radius-tab">
			<?php get_template_part( 'templates/form_umkreissuche' ); ?>
        </div>
        <!--   Tab 2 -->
        <div class="tab-pane col align-self-center fade" id="volltext" role="tabpanel" aria-labelledby="volltext-tab">
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
        </div>
        <!--   Tab 3 -->
        <div class="tab-pane col align-self-center fade" id="kreis" role="tabpanel" aria-labelledby="kreis-tab">
            <div class="row align-items-center">
				<?php get_template_part( 'templates/form_landkreisekarte' ); ?>
            </div>
        </div>
    </div>
</div>