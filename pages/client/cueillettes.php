<?php
    $cueillettes = get_all_cueillette();
    $parcelles = get_all_info_parcelle();
    $cueilleurs = get_all_info_cueilleur();
?>

<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Historique des cueillettes</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">ID</th>
                        <th class="id number">ID Parcelle</th>
                        <th class="date">Date de cueillette</th>
                        <th class="number">Poids cueilli en Kg</th>
                    </tr>
                    <?php foreach( $cueillettes as &$value ) { ?> 
                    <tr>
                        <td class="id number"><?php echo $value['id']; ?></td>
                        <td class="id number"><?php echo$value['id_parcelle']; ?></td>
                        <td class="name"><?php echo $value['date_cueillette'] ?></td>
                        <td class="name"><?php echo $value['poids_cueilli']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>

        <section class="right">
            <form id="form" class="form">
                <h1 class="form__title">Ajout de cueillette</h1>

                <hr class="form__sep">

                <div class="form__content">

                     <div class="form__input vertical">
                        <label for="field" class="form__label">Cueilleurs:</label>

                        <select name="cueilleur" id="cueilleur" class="form__input-field">
                            <?php foreach( $cueilleurs as &$value ) { ?>     
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['nom']; ?></option>
                            <?php } ?>
                        </select>
                    </div>          

                    <div class="form__input vertical">
                        <label for="date_harvest" class="form__label">Date de ceuillette:</label>

                        <input type="date" name="date_cueillete" id="date_cueillette" class="form__input-field" value="2023-01-01"/>
                    </div>

                    <div class="form__input vertical">
                        <label for="field" class="form__label">Identification parcelle:</label>

                        <select name="parcelle" id="parcelle" class="form__input-field">
                            <?php foreach( $parcelles as &$value ) { ?>     
                                <option value="<?php echo $value['id_parcelle']; ?>"><?php echo $value['numero_parcelle']; ?></option>
                            <?php } ?>
                        </select>
                    </div>  

                    <div class="form__input vertical">
                        <label for="weight_harvest" class="form__label">Poids cueilli:</label>

                        <div>
                            <input type="number" name="poids" id="poids" class="form__input-field" />
                            <span class="form__input-field unit">Kg</span>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" id="form__submit btn" />
            </form>
        </section>
    </div>

<script src="../../assets/js/cueillette.js"></script>