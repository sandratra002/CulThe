<?php 
    $list_variete_the = get_all_variete_the();
?>
<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des cultures</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">ID Type</th>
                        <th class="name">Nom du The</th>
                        <th class="occupation">Occupation en m<sup>2</sup></th>
                        <th class="rendement">Rendement en Kg/mois</th>
                    </tr>
                    <?php for($i=0; $i<count($list_variete_the); $i++){ ?>
                    <tr>
                        <td class="id number"><?php echo($list_variete_the[$i]['id']); ?></td>
                        <td class="surface"><?php echo($list_variete_the[$i]['nom']); ?></td>
                        <td class="name"><?php echo($list_variete_the[$i]['occupation']); ?></td>
                        <td class="rendement"><?php echo($list_variete_the[$i]['rendement']); ?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion de cultures</h1>
                <hr class="form__sep">
                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="nom" class="form__label">Nom : </label>
                        <div>
                            <input type="text" name="nom" id="occupation" class="form__input-field" />
                            <!-- <span class="form__input-field unit">m<sup>2</sup></span> -->
                        </div>
                    </div>
                    <div class="form__input vertical">
                        <label for="occupation" class="form__label">Occupation:</label>
                        <div>
                            <input type="number" name="occupation" id="occupation" class="form__input-field" />
                            <span class="form__input-field unit">m<sup>2</sup></span>
                        </div>
                    </div>

                    <div class="form__input vertical">
                        <label for="rendement" class="form__label">Rendement:</label>
                        <div>
                            <input type="number" name="rendement" id="rendement" class="form__input-field" />
                            <span class="form__input-field unit">Kg/mois</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="form__submit btn">Submit</button>
            </form>
        </section>
    </div>