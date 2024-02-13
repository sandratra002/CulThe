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
                        <td class="id number"><?php echo $depenses['id']; ?></td>
                        <td class="name"><?php echo $depenses[''] ?></td>
                        <td class="date">21/03/2024</td>
                        <td class="money">123</td>
                    </tr>
                    <?php } >?
                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Ajout de depense</h1>

                <hr class="form__sep">

                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="date_harvest" class="form__label">Date de ceuillette:</label>

                        <input type="date" name="date_harvest" id="date_harvest" class="form__input-field" />
                    </div>

                    <div class="form__input vertical">
                        <label for="expense_category" class="form__label">Categorie depense:</label>

                        <select name="category_id" id="expense_category" class="form__input-field">
                            <option value="">-</option>
                            <option value="0">Categorie 1</option>
                            <option value="1">Categorie 2</option>
                            <option value="2">Categorie 3</option>
                        </select>
                    </div>

                    <div class="form__input vertical">
                        <label for="weight_harvest" class="form__label">Montant:</label>

                        <input type="number" name="weight_harvest" id="weight_harvest" class="form__input-field" />
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
    </div>