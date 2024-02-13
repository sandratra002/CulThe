<?php
    $cueillettes = get_all_cueillette();
    $parcelles = get_all_info_parcelle();
    $cueilleurs = get_all_info_cueilleur();
?>

<link rel="stylesheet" href="../../assets/css/card.css">

<div class="body double-col">
    <section class="left">
        <div class="info__title">
            <div class="info__parcel info">Montant : 149000Ar</div>
            <div class="info__tea info">Total : 40000</div>
        </div>
        <div class="info__cards">
            <div class="info__card">
                <div class="info__parcel info left">###Parcel1</div>
                <div class="info__tea info center">The Sandratra Tea</div>
                <div class="info__surface info left">Surface : 12ha</div>
                <img src="../../assets/images/tea/10.jpg" alt="" class="info__image">
                <div class="info__surface info left">Pieds : 30</div>
                <div class="info__surface info left">Poids restant : 300kg</div>
            </div>
            <div class="info__card">
                <div class="info__parcel info">###Parcel1</div>
                <div class="info__tea info">The Sandratra Tea</div>
                <div class="info__surface info">Surface : 12ha</div>
                <img src="../../assets/images/tea/10.jpg" alt="" class="info__image">
                <div class="info__surface info">Pieds : 30</div>
                <div class="info__surface info">Poids restant : 300kg</div>
            </div>
        </div>
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