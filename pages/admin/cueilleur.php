<?php
    $list_cueilleur = get_all_info_cueilleur();
    $list_genre = get_all_genre();
?>

<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Liste des Cueilleurs</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">ID</th>
                        <th class="name">Nom</th>
                        <th class="date">Date de naissance</th>
                        <th class="money">Genre</th>
                        <th class="money">Poids minimal</th>
                        <th class="money">Bonus</th>
                        <th class="money">Mallus</th>
                        <th class="money">Action</th>
                    </tr>
                <?php for($i=0; $i<count($list_cueilleur); $i++){ ?>
                    <tr>
                        <td class="id number"><?php echo($list_cueilleur[$i]['id']); ?></td>
                        <td class="name"><?php echo($list_cueilleur[$i]['nom']); ?></td>
                        <td class="date"><?php echo($list_cueilleur[$i]['date_naissance']); ?></td>
                        <td class="gender"><?php echo($list_cueilleur[$i]['libelle']); ?></td>
                        <td class="gender"><?php echo($list_cueilleur[$i]['poids_minimal']); ?></td>
                        <td class="gender"><?php echo($list_cueilleur[$i]['bonus']); ?></td>
                        <td class="gender"><?php echo($list_cueilleur[$i]['malus']); ?></td>
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
            <form action="../../handler/admin/cueilleur_handler.php" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des cueilleurs</h1>
                <hr class="form__sep">
                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="nom" class="form__label">Nom:</label>
                        <input type="text" name="nom" id="nom" class="form__input-field" />
                    </div>
                    <div class="form__input-group horizontal">
                        <div class="form__input vertical">
                            <label for="birthday" class="form__label">Date de naissance:</label>
                            <input type="date" name="birthday" id="birthday" class="form__input-field" value="2023-01-01"/>
                        </div>
                    </div>
                    <div class="form__input-group horizontal">
                        <div class="form__input vertical">
                            <label for="salary" class="form__label">Genre</label>
                            <select name="genre" id="tea" class="form__input-field">
                                <?php for($i=0; $i<count($list_genre); $i++){ ?>
                                <option value="<?php echo $list_genre[$i]['id']; ?>"><?php echo $list_genre[$i]['libelle']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form__input vertical">
                            <label for="birthday" class="form__label">Poids minimal Journalier:</label>
                            <input type="number" name="poid_minimal" id="poid_minimal" class="form__input-field" />
                        </div>
                    <div class="form__input-group horizontal">
                        <div class="form__input vertical">
                            <label for="birthday" class="form__label">Bonus superieur:</label>
                            <input type="bonus_superieur" name="bonus_superieur" id="bonus_superieur" class="form__input-field" value="0"/>
                        </div>
                        <div class="form__input vertical">
                            <label for="birthday" class="form__label">Bonus Inferieur : </label>
                            <input type="bonus_inferieur" name="bonus_inferieur" id="bonus_inferieur" class="form__input-field" value="0"/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="form__submit btn" id="form__submit-btn">Insert</button>
            </form>
        </section>
    </div>
    <script src="../../assets/js/cueilleur.js"></script>