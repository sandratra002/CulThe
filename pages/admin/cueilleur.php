<?php
    $list_cueilleur = get_all_info_cueilleur();
?>

<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Liste des Cueilleurs</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">ID</th>
                        <th class="name">Nom</th>
                        <th class="date">Date de naissance</th>
                        <th class="money">Genre</th>
                    </tr>
                <?php for($i=0; $i<count($list_cueilleur); $i++){ ?>
                    <tr>
                        <td class="id number"><?php echo($list_cueilleur['id']); ?></td>
                        <td class="name"><?php echo($list_cueilleur['nom']); ?></td>
                        <td class="date"><?php echo($list_cueilleur['date_naissance']); ?></td>
                        <td class="gender"><?php echo($list_cueilleur['genre']); ?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des employees</h1>

                <hr class="form__sep">

                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="tea" class="form__label">Identification employee:</label>

                        <select name="tea_id" id="tea" class="form__input-field">
                            <option value="0">-</option>
                            <option value="0">Emp 01</option>
                            <option value="1">Emp 02</option>
                            <option value="2">Emp 03</option>
                        </select>
                    </div>

                    <div class="form__input vertical">
                        <label for="nom" class="form__label">Nom:</label>

                        <input type="number" name="nom" id="nom" class="form__input-field" />
                    </div>

                    <div class="form__input-group horizontal">
                        <div class="form__input vertical">
                            <label for="uid" class="form__label">Nom d'Identification:</label>

                            <input type="number" name="uid" id="uid" class="form__input-field" />
                        </div>
                        <div class="form__input vertical">
                            <label for="birthday" class="form__label">Date de naissance:</label>

                            <input type="date" name="birthday" id="birthday" class="form__input-field" />
                        </div>
                    </div>

                    <div class="form__input-group horizontal">
                        <div class="form__input vertical">
                            <label for="" class="form__label">Statut d'emploiement:</label>

                            <div class="form__input-group horizontal">
                                <div class="form__input horizontal">
                                    <input type="radio" name="work_status" value="yes" id="yes"
                                        class="form__input-field radio" checked>
                                    <label for="yes">Oui</label>
                                </div>
                                <div class="form__input horizontal">
                                    <input type="radio" name="work_status" value="no" id="no" class="form__input-field radio">
                                    <label for="no">Non</label>
                                </div>
                            </div>
                        </div>
                        <div class="form__input vertical">
                            <label for="salary" class="form__label">Salaire:</label>

                            <input type="number" name="salary" id="salary" class="form__input-field" />
                        </div>
                    </div>

                </div>

                <input type="submit" value="Ajouter" class="form__submit btn" />
            </form>
        </section>
    </div>