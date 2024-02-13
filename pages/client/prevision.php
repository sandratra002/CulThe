<?php
    $cueillettes = get_all_cueillette();
    $parcelles = get_all_info_parcelle();
    $cueilleurs = get_all_info_cueilleur();
?>

<div class="body double-col">
    <section class="left">
    </section>

    <section class="right">
        <form id="form" class="form">
            <h1 class="form__title">Prevoir la recolte</h1>
            <hr class="form__sep">
            <div class="form__content">       
                <div class="form__input vertical">
                    <label for="date_harvest" class="form__label">Date de ceuillette:</label>

                    <input type="date" name="date_cueillete" id="date_cueillete" class="form__input-field" value="2023-01-01" />
                </div>
            </div>
            <button type="submit" class = "form__submit btn">Preview</button>
        </form>
    </section>
</div>

<script src="../../assets/js/cueillette.js"></script>