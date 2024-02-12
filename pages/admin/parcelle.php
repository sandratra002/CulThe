<?php
    $list_parcel = get_all_info_parcelle();
    $list_variete_the = get_all_variete_the();
?>
<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des parcelles</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">Numero parcelle</th>
                        <th class="surface">Surface en Ha</th>
                        <th class="name">Type de plantation</th>
                    </tr>
                <?php for($i=0; $i<count($list_parcel); $i++){ ?>
                    <tr>
                        <td class="id number"><?php echo($list_parcel[$i]['numero_parcelle']); ?></td>
                        <td class="surface"><?php echo($list_parcel[$i]['surface_parcelle']); ?></td>
                        <td class="name"><?php echo($list_parcel[$i]['nom_variete_the']); ?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="../../handler/admin/parcelle_handler.php" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des parcelles</h1>
                <hr class="form__sep">
                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="numero" class="form__label">Numero</label>
                        <input type="number" name="numero" id="numero" class="form__input-field" />
                    </div>
                    <div class="form__input vertical">
                        <label for="occupation" class="form__label">Surface:</label>
                        <div>
                            <input type="number" name="surface" id="occupation" class="form__input-field" />
                            <span class="form__input-field unit">Ha</span>
                        </div>
                    </div>
                    <div class="form__input vertical">
                        <label for="salary" class="form__label">Variety : </label>
                        <select name="variete" id="tea" class="form__input-field">
                            <?php for($i=0; $i<count($list_variete_the); $i++){ ?>
                                <option value="<?php echo $list_variete_the[$i]['id']; ?>"><?php echo $list_variete_the[$i]['nom']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
    </div>