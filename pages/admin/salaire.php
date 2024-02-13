<?php 
    $list_salaire = get_all_info_salaire();
    $list_cueilleur = get_all_info_cueilleur();
?>
<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des salaires</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">ID</th>
                        <th class="id number">IdUser</th>
                        <th class="id number">Nom</th>
                        <th class="name number">Salaire</th>
                        <th class="name">Action</th>
                    </tr>
                    <?php for($i=0; $i<count($list_salaire); $i++){ ?>
                    <tr>
                        <td class="id number"><?php echo $list_salaire[$i]['id_salaire']; ?></td>
                        <td class="name"><?php echo $list_salaire[$i]['id_cueilleur']; ?></td>
                        <td class="name"><?php echo $list_salaire[$i]['nom_cueilleur']; ?></td>
                        <td class="name number"><?php echo $list_salaire[$i]['montant']; ?></td>
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
            <form action="../../handler/admin/salaire_handler.php" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des salaires</h1>
                <hr class="form__sep">
                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="tea" class="form__label">Cueilleur : </label>
                        <select name="cueilleur" id="tea" class="form__input-field">
                            <?php for($i=0; $i<count($list_cueilleur); $i++){ ?>
                                <option value="<?php echo $list_cueilleur[$i]['id_cueilleur']; ?>"><?php echo $list_cueilleur[$i]['nom_cueilleur']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form__input vertical">
                        <label for="expense" class="form__label">Salaire: </label>
                        <input type="number" min="0"name="salaire" id="expense" class="form__input-field" />
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" id="form__submit-btn"/>
            </form>
        </section>
    </div>
<script src="../../assets/js/salaire.js"></script>