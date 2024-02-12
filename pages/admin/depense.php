<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des depenses</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">ID Depense</th>
                        <th class="name">Libelle de categorie</th>
                    </tr>

                    <tr>
                        <td class="id number">1</td>
                        <td class="name">Transportations</td>
                    </tr>

                    <tr>
                        <td class="id number">1</td>
                        <td class="name">Transportations</td>
                    </tr>

                    <tr>
                        <td class="id number">1</td>
                        <td class="name">Transportations</td>
                    </tr>

                    <tr>
                        <td class="id number">1</td>
                        <td class="name">Transportations</td>
                    </tr>

                    <tr>
                        <td class="id number">1</td>
                        <td class="name">Transportations</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des depenses</h1>

                <hr class="form__sep">

                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="field" class="form__label">Identification categorie:</label>

                        <select name="field_id" id="field" class="form__input-field">
                            <option value="">-</option>
                            <option value="0">Categorie 1</option>
                            <option value="1">Categorie 2</option>
                            <option value="2">Categorie 3</option>
                        </select>
                    </div>

                    <div class="form__input vertical">
                        <label for="expense" class="form__label">Libelle de categorie:</label>

                        <input type="text" name="expense_label" id="expense" class="form__input-field" />
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
    </div>