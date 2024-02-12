<?php

    require("../../inc/functions.php");
    $depenses = get_all_categorie_depense();
?>

<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des depenses</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">Id</th>
                        <th class="name">Libelle</th>
                        <th class="name">Action</th>
                    </tr>
                    <?php foreach($depenses as &$value){ ?>
                    <tr>
                        <td class="id number"><?php echo $value['id']; ?></td>
                        <td class="name"><?php echo $value['libelle']; ?></td>
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
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des depenses</h1>

                <hr class="form__sep">

                <div class="form__content">

                    <div class="form__input vertical">
                        <label for="expense" class="form__label">Libelle de categorie:</label>

                        <input type="text" name="expense_label" id="expense" class="form__input-field" />
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
</div>
<script src="../../assets/js/depense.js"></script>