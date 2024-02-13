<?php
    $depenses = get_all_depense();
    $categoryDepense = get_all_categorie_depense();
?>

<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Historique des depenses</h1>
            <hr class="section__sep">
            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">ID</th>
                        <th class="name">Categorie de depense</th>
                        <th class="date">Date</th>
                        <th class="money">Montant</th>
                    </tr>
                    <?php foreach($depenses as &$value){ ?>
                    <tr>
                        <td class="id number"><?php echo $value['id']; ?></td>
                        <td class="name"><?php echo $value['categorie_depense'];?></td>
                        <td class="date"><?php echo  $value['date_depense']; ?></td>
                        <td class="money"><?php echo $value['montant']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="../../handler/client/depense_handler.php" method="post" id="login-form" class="form">
                <h1 class="form__title">Ajout de depense</h1>

                <hr class="form__sep">

                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="date_harvest" class="form__label">Date de ceuillette:</label>

                        <input type="date" name="date_depense" id="date_harvest" class="form__input-field" value="2024-02-14"/>
                    </div>

                    <div class="form__input vertical">
                        <label for="expense_category" class="form__label">Categorie depense:</label>

                        <select name="categorie" id="expense_category" class="form__input-field">
                            <?php foreach($categoryDepense as &$value){ ?> 
                            <option value="<?php echo $value['id']; ?>"> <?php echo $value['libelle']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form__input vertical">
                        <label for="weight_harvest" class="form__label">Montant:</label>

                        <input type="number" name="montant" id="weight_harvest" class="form__input-field" />
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
    </div>