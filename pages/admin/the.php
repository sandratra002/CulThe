<?php 
    $list_variete_the = get_all_variete_the();
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
?>
<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des cultures</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">ID</th>
                        <th class="name">Nom</th>
                        <th class="occupation">Occupation</th>
                        <th class="rendement">Rendement</th>
                        <th class="rendement">Prix de vente</th>
                        <th>Action</th>
                    </tr>
                    <?php for($i=0; $i<count($list_variete_the); $i++){ ?>
                    <tr>
                        <td class="id number"><?php echo($list_variete_the[$i]['id']); ?></td>
                        <td class="surface"><?php echo($list_variete_the[$i]['nom']); ?></td>
                        <td class="name"><?php echo($list_variete_the[$i]['occupation']); ?></td>
                        <td class="rendement"><?php echo($list_variete_the[$i]['rendement']); ?></td>
                        <td class="rendement"><?php echo($list_variete_the[$i]['rendement']); ?></td>
                        <td>
                            <a href="#" class="edit-btn"><i class="fa fa-edit"></i></a>
                            <a href="#" class="delete-btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="../../handler/admin/the_handler.php" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion de cultures</h1>
                <hr class="form__sep">
                <div class="form__content">
                    <div class="form__input horizontal">
                        <div class="form__input vertical">
                            <label for="nom" class="form__label">Nom : </label>
                            <div>
                                <input type="text" name="nom" id="nom" class="form__input-field" />
                                <!-- <span class="form__input-field unit">m<sup>2</sup></span> -->
                            </div>
                        </div>
                        <div class="form__input vertical">
                                <label for="prix_vente" class="form__label">Prix de Vente:</label>
                                <div>
                                    <input type="number" name="prix_vente" id="prix_vente" class="form__input-field" />
                                    <span class="form__input-field unit">Ar</span>
                                </div>
                        </div>
                    </div>
                    <div class="form__input vertical">
                        <label for="occupation" class="form__label">Occupation:</label>
                        <div>
                            <input type="number" name="occupation" id="occupation" class="form__input-field" />
                            <span class="form__input-field unit">m<sup>2</sup></span>
                        </div>
                    </div>
                    <div class="form__input horizontal">
                        <div class="form__input vertical">
                            <label for="rendement" class="form__label">Rendement:</label>
                            <div>
                                <input type="number" name="rendement" id="rendement" class="form__input-field" />
                                <span class="form__input-field unit">Kg/mois</span>
                            </div>
                        </div>
                    </div>
                    <div class="form__input horizontal">
                        <?php for($i = 0; $i < 6; $i++){ ?>
                            <input type="checkbox" name="<?php echo strtolower($months[$i]); ?>" id="<?php echo strtolower($months[$i]); ?>" class="form__input-field" />
                            <label for="<?php echo strtolower($months[$i]); ?>" class="form__label"><?php echo $months[$i] ?></label>
                        <?php } ?>
                    </div>
                    <div class="form__input horizontal">
                        <?php for($i = 6; $i < 12; $i++){ ?>
                        <!-- <div class="form__input"> -->
                            <input type="checkbox" name="<?php echo strtolower($months[$i]); ?>" id="<?php echo strtolower($months[$i]); ?>" class="form__input-field" />
                            <label for="<?php echo strtolower($months[$i]); ?>" class="form__label"><?php echo $months[$i]; ?></label>
                        <!-- </div> -->
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class="form__submit btn" id="form__submit-btn">Submit</button>
            </form>
        </section>
    </div>
    <script src="../../assets/js/the.js"></script>